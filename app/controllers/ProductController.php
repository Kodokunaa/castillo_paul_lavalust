<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
require_once APP_DIR . 'libraries/Lab5Session.php';

class ProductController extends Controller
{
    private function model(): ProductModel
    {
        $this->call->database();
        $this->call->model('ProductModel');
        return $this->ProductModel;
    }

    private function product(int $id): array
    {
        if ($id < 1 || !($product = $this->model()->find($id))) {
            show_404();
            exit;
        }
        return $product;
    }

    private function input(): array
    {
        return [
            'product_name' => trim((string) ($_POST['product_name'] ?? '')),
            'description' => trim((string) ($_POST['description'] ?? '')),
            'price' => trim((string) ($_POST['price'] ?? '')),
            'quantity' => trim((string) ($_POST['quantity'] ?? '')),
        ];
    }

    private function validate(array $data): array
    {
        $errors = [];
        if ($data['product_name'] === '' || mb_strlen($data['product_name']) > 100) {
            $errors[] = 'Product name must be 1 to 100 characters.';
        }
        if ($data['description'] === '') {
            $errors[] = 'Description is required.';
        }
        if (!preg_match('/^(?:0|[1-9][0-9]{0,7})(?:\.[0-9]{1,2})?$/', $data['price'])) {
            $errors[] = 'Price must be a nonnegative amount with at most two decimal places.';
        }
        if (!preg_match('/^(?:0|[1-9][0-9]{0,9})$/', $data['quantity'])
            || (float) $data['quantity'] > 2147483647) {
            $errors[] = 'Quantity must be a nonnegative whole number.';
        }
        return $errors;
    }

    private function form(string $mode, array $product, array $errors = []): void
    {
        $this->call->view('lab5/form', [
            'mode' => $mode,
            'product' => $product,
            'errors' => $errors,
            'csrf_token' => Lab5Session::token(),
        ]);
    }

    public function index()
    {
        $this->call->view('lab5/products', [
            'products' => $this->model()->all(),
            'csrf_token' => Lab5Session::token(),
        ]);
    }

    public function create()
    {
        $this->form('create', ['product_name' => '', 'description' => '', 'price' => '', 'quantity' => '']);
    }

    public function store()
    {
        Lab5Session::check_token();
        $data = $this->input();
        if ($errors = $this->validate($data)) {
            http_response_code(422);
            $this->form('create', $data, $errors);
            return;
        }
        $this->model()->insert($data);
        header('Location: ' . site_url('products'), true, 303);
        exit;
    }

    public function edit($id)
    {
        $this->form('edit', $this->product((int) $id));
    }

    public function update($id)
    {
        Lab5Session::check_token();
        $this->product((int) $id);
        $data = $this->input();
        if ($errors = $this->validate($data)) {
            $data['id'] = (int) $id;
            http_response_code(422);
            $this->form('edit', $data, $errors);
            return;
        }
        $this->model()->update((int) $id, $data);
        header('Location: ' . site_url('products'), true, 303);
        exit;
    }

    public function confirm_delete($id)
    {
        $this->call->view('lab5/delete', [
            'product' => $this->product((int) $id),
            'csrf_token' => Lab5Session::token(),
        ]);
    }

    public function destroy($id)
    {
        Lab5Session::check_token();
        $this->product((int) $id);
        $this->model()->delete((int) $id);
        header('Location: ' . site_url('products'), true, 303);
        exit;
    }
}
