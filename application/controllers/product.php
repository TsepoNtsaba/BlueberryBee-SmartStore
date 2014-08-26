<?php

/**
 * Class Product
 * The product controller. Here we create, read, update and delete (CRUD) example data.
 */
class Product extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // VERY IMPORTANT: All controllers/areas that should only be usable by logged-in users
        // need this line! Otherwise not-logged in users could do actions. If all of your pages should only
        // be usable by logged-in users: Put this line into libs/Controller->__construct
        Auth::handleLogin();
    }

    /**
     * This method controls what happens when you move to /product/index in your app.
     * Gets all products (of the user).
     */
    public function index()
    {
        $product_model = $this->loadModel('Product');
        $this->view->products = $product_model->getAllProducts();
        $this->view->render('product/index');
    }

    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new product. This is usually the target of form submit actions.
     */
    public function create()
    {
        // optimal MVC structure handles POST data in the controller, not in the model.
        // personally, I like POST-handling in the model much better (skinny controllers, fat models), so the login
        // stuff handles POST in the model. in this product-controller/model, the POST data is intentionally handled
        // in the controller, to show people how to do it "correctly". But I still think this is ugly.
	$product_model = $this->loadModel('Product');
	$product_model->create();
    }

    /**
     * This method controls what happens when you move to /product/edit(/XX) in your app.
     * Shows the current content of the product and an editing form.
     * @param $product_id int id of the product
     */
    public function edit($product_id)
    {
        if (isset($product_id)) {
            // get the product that you want to edit (to show the current content)
            $product_model = $this->loadModel('Product');
            $this->view->product = $product_model->getProduct($product_id);
            $this->view->render('product/edit');
        } else {
            header('location: ' . URL . 'product');
        }
    }
    
    /**
     * Getter for all products (products are an implementation of example data, in a real world application this
     * would be data that the user has created)
     * @return array an array with several objects (the results)
     */
    public function getAllProducts()
    {
	$product_model = $this->loadModel('Product');
        $stock = $product_model->getAllProducts();
	return $stock;
    }

    /**
     * This method controls what happens when you move to /product/editsave(/XX) in your app.
     * Edits a product (performs the editing after form submit).
     * @param int $product_id id of the product
     */
    public function editSave($product_id)
    {
        if (isset($_POST['product_text']) && isset($product_id)) {
            // perform the update: pass product_id from URL and product_text from POST
            $product_model = $this->loadModel('Product');
            $product_model->editSave($product_id, $_POST['product_text']);
        }
        header('location: ' . URL . 'product');
    }

    /**
     * This method controls what happens when you move to /product/delete(/XX) in your app.
     * Deletes a product. In a real application a deletion via GET/URL is not recommended, but for demo purposes it's
     * totally okay.
     * @param int $product_id id of the product
     */
    public function delete($product_id)
    {
        if (isset($product_id)) {
            $product_model = $this->loadModel('Product');
            $product_model->delete($product_id);
        }
        header('location: ' . URL . 'product');
    }
}
