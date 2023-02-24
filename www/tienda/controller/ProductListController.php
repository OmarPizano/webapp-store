<?php
namespace tienda\controller;
use tienda\core\Request;
use tienda\core\Response;
use tienda\core\Session;
use tienda\core\View;
use tienda\models\CategoriesModel;
use tienda\models\ProductListModel;

class ProductListController
{
    public static function getFeatured(Request $request) {
        $model = new ProductListModel();
        $model->selectAllProducts();
        $list = $model->getProductList();
        return new View(['list' => $list], 'product/featured', 'Productos Destacados');
    }

    public static function crudProducts(Request $request) {
        if (Session::get('user_id') and Session::get('admin')) {
            $model = new ProductListModel();
            if ($request->getMethod() === 'POST') {
                $model->searchProducts($request->query('search'));
            } else {
                $model->selectAllProducts();
            }
            $search = $model->search;
            $crud_names = $model->crud_names;
            $products = $model->getProductList();
            return new View([
                'search' => $search,
                'crud_names' => $crud_names,
                'products' => $products
            ], 'product/crud', 'Administración de Productos');
        } else {
            Session::alert('Permiso denegado al recurso.', false);
            Response::redirect('/');
        }
    }

    public static function editProduct(Request $request) {
        if (Session::get('user_id') and Session::get('admin')) {
            $model = new ProductListModel();
            if ($request->getMethod() === 'POST') {
                // Guardar los cambios
                $model->loadModel($request->dump());
                if ($model->updateProduct()) {
                    Session::alert('Producto modificado.', true);
                    Response::redirect('/product/admin');
                } else {
                    Session::alert('Fallo al actualizar el producto.', false);
                }
            } else {
                // Cargar el producto en el modelo
                $model->loadProduct($request->query('id'));
                $catmodel = new CategoriesModel();
                $catmodel->selectAll();
                $cats = $catmodel->getAll();
            }
            return new View(
                ['id' => $model->id,
                'product_image' => $model->product_image,
                'product_name' => $model->product_name,
                'product_description' => $model->product_description,
                'category_id' => $model->category_id,
                'product_stock' => $model->product_stock,
                'product_price' => $model->product_price,
                'product_discount' => $model->product_discount,
                'cats' => $cats,
            ], 'product/edit', 'Editar un Producto');
        } else {
            Session::alert('Permiso denegado al recurso.', false);
            Response::redirect('/');
        }
    }

    public static function newProduct(Request $request) {
        if (Session::get('user_id') and Session::get('admin')) {
            $model = new ProductListModel();
            if ($request->getMethod() === 'POST') {
                $model->loadModel($request->dump());
                if ($model->createProduct()) {
                    Session::alert('Producto agregado.', true);
                    Response::redirect('/product/admin');
                } else {
                    Session::alert('Fallo al crear el producto.', false);
                }
            }
            // Cargar la vista
            $catmodel = new CategoriesModel();
            $catmodel->selectAll();
            $cats = $catmodel->getAll();
            return new View(
                ['id' => $model->id,
                'product_image' => $model->product_image,
                'product_name' => $model->product_name,
                'product_description' => $model->product_description,
                'category_id' => $model->category_id,
                'product_stock' => $model->product_stock,
                'product_price' => $model->product_price,
                'product_discount' => $model->product_discount,
                'cats' => $cats,
            ], 'product/new', 'Crear un Producto');
        } else {
            Session::alert('Permiso denegado al recurso.', false);
            Response::redirect('/');
        }

    }

    public static function deleteProduct(Request $request) {
        if (Session::get('user_id') and Session::get('admin')) {
            $model = new ProductListModel();
            if ($model->deleteProduct($request->query('id'))) {
                Session::alert('Producto eliminado.', true);
                Response::redirect('/product/admin');
            } else {
                Session::alert('Fallo al eliminar el producto.', false);
            }
        } else {
            Session::alert('Permiso denegado al recurso.', false);
            Response::redirect('/');
        }
    }
}