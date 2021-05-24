<?php

Route::get('/',[

    'uses'=>'NewShopController@index',
    'as'=>'/'
]);

Route::get('/category-product/{id}',[
    'uses'=>'NewShopController@CategoryProduct',
    'as'=>'category-product'
]);

Route::get('/details-product/{id}/{name}',[
    'uses'=>'NewShopController@productDetails',
    'as'=>'product-details'
]);

Route::post('/cart/add',[
    'uses'=>'CartController@addToCart',
    'as'=>'add-to-cart'
]);

Route::get('/cart/show',[
    'uses'=>'CartController@showCart',
    'as'=>'show-cart'
]);

Route::get('/cart/delete/{id}',[
    'uses'=>'CartController@deleteCart',
    'as'=>'delete-cart'
]);

Route::post('/cart/update',[
    'uses'=>'CartController@updateCart',
    'as'=>'update-cart'
]);

Route::get('/checkout',[
    'uses'=>'CheckoutController@index',
    'as'=>'checkout'
]);

Route::post('/customer/registration',[
    'uses'=>'CheckoutController@customerSignup',
    'as'=>'customer-sign-up'
]);

Route::post('/customer/login',[
    'uses'=>'CheckoutController@customerLoginCheck',
    'as'=>'customer-login'
]);

Route::get('/checkout/shipping',[
    'uses'=>'CheckoutController@shippingForm',
    'as'=>'checkout-shipping'
]);

Route::post('/shipping/save',[
    'uses'=>'CheckoutController@saveShippinInfo',
    'as'=>'new-shipping'
]);

Route::get('/checkout/payment',[
    'uses'=>'CheckoutController@paymentForm',
    'as'=>'checkout-payment'
]);

Route::post('/checkout/order',[
    'uses'=>'CheckoutController@newOrder',
    'as'=>'new-order'
]);

Route::get('/complete/order',[
    'uses'=>'CheckoutController@completeOrder',
    'as'=>'complete-order'
]);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/add',[
    'uses'=>'categoryController@index',
    'as'=>'add-category'
]);

Route::post('/category/save',[
    'uses'=>'categoryController@saveCategory',
    'as'=>'new-category'
]);

Route::get('/category/manage',[
    'uses'=>'categoryController@manageCategoryInfo',
    'as'=>'manage-category'
]);

Route::get('/category/unpublished/{id}',[
    'uses'=>'categoryController@unpublishedCategoryInfo',
    'as'=>'unpublished-category'
]);

Route::get('/category/published/{id}',[
    'uses'=>'categoryController@publishedCategoryInfo',
    'as'=>'published-category'
]);


Route::get('/category/edit/{id}',[
    'uses'=>'categoryController@editCategoryInfo',
    'as'=>'edit-category'
]);

Route::post('/category/update',[
    'uses'=>'categoryController@updateCategoryInfo',
    'as'=>'update-category'
]);


Route::get('/category/delete/{id}',[
    'uses'=>'categoryController@delete',
    'as'=>'delete-category'
]);

Route::get('/brand/add',[
    'uses'=>'BrandController@index',
    'as'=>'add-brand'
]);

Route::post('/brand/save',[
    'uses'=>'BrandController@saveBrandInfo',
    'as'=>'new-brand'
]);

Route::get('/product/add',[
    'uses'=>'ProductController@index',
    'as'=>'add-product'
]);

Route::post('/product/save',[
    'uses'=>'ProductController@saveProductInfo',
    'as'=>'new-product'
]);

Route::get('/product/manage',[
    'uses'=>'ProductController@manageProduct',
    'as'=>'manage-product'
]);

Route::get('/product/edit/{id}',[
    'uses'=>'ProductController@editProductInfo',
    'as'=>'edit-product'
]);

Route::post('/product/update',[
    'uses'=>'ProductController@updateProductInfo',
    'as'=>'update-product'
]);

Route::get('/product/delete/{id}',[
    'uses'=>'ProductController@deleteProductInfo',
    'as'=>'delete-product'
]);

Route::get('/manage/order',[
    'uses'=>'orderController@manageOrderInfo',
    'as'=>'manage-order'
]);

Route::get('/edit/order/{id}',[
    'uses'=>'orderController@editOrder',
    'as'=>'edit-order'
]);

Route::post('/update/order/',[
    'uses'=>'orderController@updateOrderInfo',
    'as'=>'update-order'
]);

Route::get('/delete/order/{id}',[
    'uses'=>'orderController@deleteOrderInfo',
    'as'=>'delete-order'
]);


Route::get('/order/details/{id}',[
    'uses'=>'orderController@viewOrderDetail',
    'as'=>'view-order-detail'
]);






