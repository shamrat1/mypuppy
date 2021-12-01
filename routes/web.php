<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
use App\Models\Product;
use App\Mail\NewPost;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LiveSearchController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\PolipayController;
use App\Http\Controllers\ResourceCenterController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VeterinaryController;
use App\Http\Controllers\PetGuideController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\DogTrainingController;
use App\Http\Controllers\AdminWebPageController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\BookAppointmentController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\ComssionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Homepage.welcome');
});

Route::get('/testomg', function () {
    ComssionController::giveCommission(15,100,8);
});

Route::get('/affiliate-program', function () {
    return view('Webpages.affiliate_program');
});

Route::get('/cart', function () {
    return view('Webpages.cart');
});
Route::get('/wishlist', function () {
    return view('Webpages.wishlist');
});
Route::get('/checkout', function () {
    return view('Payment.checkout');
});
Route::get('/about', function () {
    return view('Webpages.about');
});
Route::get('/privacy', function () {
    return view('Webpages.privacy');
});
Route::get('/terms-and-conditions', function () {
    return view('Webpages.termsAndConditions');
});
Route::get('/product-guarantee-registration', function () {
    return view('Webpages.product_gurantee_registration');
});
Route::get('/contact', function () {
    return view('Webpages.contact');
});
Route::get('/adoptions', function () {
    return view('MyServices.adoptions');
});
Route::get('/adoptions', function () {
    return view('MyServices.adoptions');
});
Route::get('vital-care', function () {
    return view('MyServices.vitalCare');
});
Route::get('/pet-insurance', function () {
    return view('MyServices.petInsurance');
});
Route::get('/dog-washing-stations', function () {
    return view('MyServices.DogWashingStations');
});
Route::get('/veterinary-service', function () {
    return view('MyServices.veterinary');
});
Route::get('/dog-grooming', function () {
    return view('MyServices.dogGrooming');
});
Route::get('/dog-training', function () {
    return view('MyServices.dog-training');
});
Route::get('/in-store-dog-training', function () {
    return view('MyServices.inStoreDogTraining');
});
Route::get('/online-dog-training-courses', function () {
    return view('MyServices.onlineDogTraining');
});
Route::get('/our-service-partner', function () {
    return view('Webpages.ourServicePartner');
});
Route::get('/services', function () {
    return view('MyServices.services');
});
Route::get('/rewards', function () {
    return view('Webpages.rewards');
});
Route::get('/veterinary-services', function () {
    return view('MyServices.veterinary');
});
Route::get('/repair-service', function () {
    return view('MyServices.repairService');
});
Route::get('/diy-dog-wash', function () {
    return view('MyServices.diyDayWash');
});
Route::get('/shipping-and-return', function () {
    return view('Webpages.shippindAndReturn');
});
Route::get('/resource-center', function () {
    return view('ResourceCenterBlogs.resourceCenter');
});

Route::get('/new-pet-guides', function () {
    return view('MyPetGuides.petGuides');
});


Route::get('new-dog-guide', function () {
    return view('MyPetGuides.newDog_guide');
});
Route::get('new-cat-guide', function () {
    return view('MyPetGuides.newCat_guide');
});
Route::get('saltwater-fish-guide', function () {
    return view('MyPetGuides.newFish_guide');
});
Route::get('bird-guide', function () {
    return view('MyPetGuides.bird_guide');
});
Route::get('new-rabbit-guide', function () {
    return view('MyPetGuides.newRabbit_guide');
});
Route::get('reptile-guide', function () {
    return view('MyPetGuides.newReptile_guide');
});
Route::get('store-services', function () {
    return view('Webpages.storeServices');
});
Route::get('services-locations', function () {
    return view('Webpages.servicesLocations');
});
Route::get('/shop',[CategoryController::class,'myShop']);
Route::get('/sort-shop/{sort}',[CategoryController::class,'sortShop']);
Route::get('/new',[CategoryController::class,'newCollections']);
Route::get('/new-category/{slug}',[CategoryController::class,'newCollectionsByCategory']);
Route::get('/new/{sort}',[CategoryController::class,'sortNewCollections'])->name('sort_new_collections');
Route::get('/new-category/{slug}/{sort}',[CategoryController::class,'newSortCollectionsByCategory']);
Route::get('/sale',[CategoryController::class,'saleCollections']);
Route::get('/sale/{sort}',[CategoryController::class,'sortSaleCollections'])->name('sort_sale_collections');
Route::get('/sale-category/{slug}',[CategoryController::class,'saleCollectionsByCategory']);
Route::get('/sale-category/{slug}/{sort}',[CategoryController::class,'saleSortCollectionsByCategory']);

Route::get('/best-selling-products',[CategoryController::class,'bestSellerCollections']);
Route::get('/best-selling-products/{sort}',[CategoryController::class,'sortBestSellerCollections'])->name('sort_bestSeller_collections');

Route::get('/my-affiliate-dashboard',[AffiliateController::class,'myAffiliate']);
Route::get('/monthly-sales',[CategoryController::class,'monthlySalesCollections']);
Route::get('/monthly-sales/{sort}',[CategoryController::class,'sortMonthlySaleCollections'])->name('sort_monthly_sale_collections');

Route::get('/shop/{slug}',[CategoryController::class,'myCategories'])->name('shop_category');
Route::get('/shop/{slug}/{sort}',[CategoryController::class,'sortShopCollections'])->name('sort_shop_collections');

Route::get('/shop-category/{slug}/{sort}',[LiveSearchController::class,'SortCategoriesShop'])->name('category_sortShop');

Route::get('/my-shop/{categorySlug}/{subcategorySlug}',[CategoryController::class,'SubCategoryShop'])->name('subcategory_shop');

Route::get('/subcategory_shop/{categorySlug}/{subcategorySlug}/{sort}',[LiveSearchController::class,'SortSubCategoriesShop'])->name('subcategory_sortShop');

Route::get('/shop/{categorySlug}/{subcategorySlug}/{subcategorytypeSlug}',[CategoryController::class,'SubCategoriesTypeShop'])->name('subcategorytype_shop');
Route::get('/shop/{categorySlug}/{subcategorySlug}/{subcategorytypeSlug}/{producttypeSlug}',[LiveSearchController::class,'ProductTypeSelection'])->name('productTypeSelection_shop');
Route::get('/shop-sort/{categorySlug}/{subcategorySlug}/{subcategorytypeSlug}/{sort}',[LiveSearchController::class,'SortSubCategoriesTypeShop'])->name('subcategorytype_sortShop');


Route::get('/product-type-shop/{categorySlug}/{subcategorySlug}/{subcategorytypeSlug}/{producttypeSlug}/{sort}',[LiveSearchController::class,'sortProductTypeSelection'])->name('productTypeSelection_Sortshop');

Route::get('/product-details/{slug}', [CategoryController::class, 'singleEquipment']);

Route::get('add-to-wishlist/{id}', [ProductController::class,'addtoWishlist']);
Route::get('remove-from-wishlist/{id}', [ProductController::class,'deletefromWishlist']);
Route::get('/wishlist',[ProductController::class,'getWishlist'] );
Route::get('cart', [CategoryController::class,'cart'])->name('cart.index');

Route::get('add-to-cart/{id}', [CategoryController::class,'addToCart']);
Route::get('add-to-cart-sale/{id}/{price}', [CategoryController::class,'addToCartSale'])->name('sale_addToCart');

Route::get('/change-qty/{product}', [CategoryController::class,'changeQty'])->name('change_qty');

Route::delete('remove-from-cart', [CategoryController::class,'remove']);

Route::get('checkout', [HomeController::class, 'checkout'])->name('check_out');
Route::post('profile', [HomeController::class,'updateProfile'])->name('profile.update');
Route::get('/search', [CategoryController::class, 'search']);

Route::post('/pet-adoption-search', [BookAppointmentController::class, 'petAdoptionSearch'])->name('search.adoptions');


Route::get('/resource-center/{slug}',[ResourceCenterController::class,'myBlogs'])->name('resource_center_blog');
Route::get('/resource-center/{blogSlug}/{blogTypeSlug}',[ResourceCenterController::class,'myBlogTypes'])->name('resource_center_blog_type');
Route::get('/resource-center/{blogSlug}/{blogTypeSlug}/{resourceCenterSlug}',[ResourceCenterController::class,'myResourceCenter'])->name('resource_center_display');

Auth::routes();
Route::get('/user-settings', [HomeController::class,'user_settings']);
Route::post('change-password', [HomeController::class, 'changePassword'])->name('change.password');
Route::post('/apply_coupon_code',[LiveSearchController::class,'couponcode']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/generate/referralCode', [App\Http\Controllers\HomeController::class, 'generateReferral'])->name('home.generate.referral');
Route::get('/my-orders',[OrderController::class,'myOrders']);
Route::get('/invoice/{id}',[OrderController::class,'genInvoice'])->name('invoice');

// saving calendar event data in to database
Route::post('add-calendar-event-ajax', [OrderController::class, 'addCalendarEventAjax']);

Route::post('get-schedule-data', [OrderController::class, 'getScheduleData']);

//route for processing payment
Route::post('/paypal',[PaypalController::class,'paywithpaypal'])->name('paypal');

//route for check status if the payment
Route::get('/process-paypal',[PaypalController::class,'processPaypal'])->name('process.paypal');
Route::get('/cancel-paypal',[PaypalController::class,'cancelPaypal'])->name('cancel.paypal');

Route::get('/Cancelled',[PolipayController::class,'cancelPolipay'])->name('cancel.polipay');

Route::post('/polipay',[PolipayController::class,'paywithpolipay'])->name('polipay');
Route::get('/cache', function() {
    Artisan::call('cache:clear');
});

Route::get('/storage', function() {
    Artisan::call('storage:link');
});

Route::get('/book-appointment',[BookAppointmentController::class,'BookAppointment']);
// Route::post('get-schedule-data',[BookAppointmentController::class,'getAvailableTimingByDate']);
Route::get('/adopt-a-pet',[BookAppointmentController::class,'petAdaption']);
Route::get('/service-appointment', function () {
    return view('MyServices.services');
});

Route::post('/search-service-list',[BookAppointmentController::class,'searchServiceList'])->name('search-service-list');
Route::post('/service-appointment',[BookAppointmentController::class,'ServiceAppointment'])->name('appointment.service');
Route::group(['middleware'=>['auth','admin']], function () {
    Route::get('product', [ProductController::class, 'index']);
    Route::post('product', [ProductController::class, 'upload'])->name('product_store');
    Route::get('products/create', [ProductController::class, 'create']);
    Route::post('/live_search/action',[ LiveSearchController::class,'action'])->name('live_search.action');
    Route::post('product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/{id}', [ProductController::class, 'edit'])->name('product.edit');

    Route::post('product_update/{id}', [ProductController::class, 'productUpdate'])->name('product_update');
    Route::get('product_delete/{id}', [ProductController::class, 'productDelete'])->name('product_delete');

    Route::get('products/{id}', [ProductController::class,'show'])->name('product.show');
    Route::get('product-gallery/{id}', [ProductController::class, 'gallery'])->name('product.gallery');
    Route::post('image-gallery/{id}', [ProductController::class, 'Gallery_Update'])->name('gallery_update');
    Route::get('product-size/{id}', [ProductController::class,'prod_size'])->name('product.size');
    Route::post('size_update/{id}', [ProductController::class, 'size_update'])->name('size_update');


    Route::post('get-sub-category-type-dropdown', [ProductController::class, 'subcategorytypeDropdown'])->name('subcategorytype_dropdown');
    Route::post('get-product-type-dropdown', [ProductController::class, 'productTypeDropdown'])->name('product_type_dropdown');

    Route::get('product/search', [ProductController::class, 'search']);
    Route::get('/send',function(){

        $product = Product::findorFail(24);
        //send mail
        Mail::to('max.perry@meritzeal.com')->send(new NewPost($product));
        return (new NewPost($product))->render();

    });
    Route::get('/about-company',[HomeController::class,'company']);
    Route::post('/update-companyinfo',[HomeController::class,'updateCompanyInfo']);
    Route::post('/update-companySixPoints',[HomeController::class,'updateSixPoints']);
    Route::post('/update-testimonial',[HomeController::class,'updateTestimonial']);
    Route::get('/slider-images',[HomeController::class,'sliders']);
    Route::post('/update-slides',[HomeController::class,'updateSlides']);
    Route::post('/update-caption',[HomeController::class,'updateCaption']);
    Route::get('/about-page-content',[HomeController::class,'aboutpageContent']);
    Route::post('/update-page-content',[HomeController::class,'updatepageContent']);
    Route::get('/contact-details',[HomeController::class,'contactDetails']);
    Route::post('/upd-contact-details',[HomeController::class,'updContactDetails']);

    Route::get('/categories',[HomeController::class,'categories']);
    Route::get('category/create', [HomeController::class, 'addCategory']);
    Route::post('store-category', [HomeController::class, 'saveCategory'])->name('category_store');
    Route::post('category/{id}', [HomeController::class, 'updateCategoryData'])->name('category_update');
    Route::get('category/{id}', [HomeController::class, 'editCategory'])->name('category_edit');
    Route::post('category_update/{id}', [HomeController::class, 'categoryUpdate'])->name('category_update');
    Route::get('category_delete/{id}', [HomeController::class, 'categoryDelete'])->name('category_delete');
    Route::get('category/{id}', [HomeController::class,'categoryShowData'])->name('category_show');
    Route::post('/update-categories',[HomeController::class,'updateCategories']);

    Route::get('/sub-categories',[SubCategoryController::class,'subcategories']);
    Route::get('subcategory/create', [SubCategoryController::class, 'addsubCategory']);
    Route::post('store-subcategory', [SubCategoryController::class, 'saveSubCategory'])->name('subcategory_store');
    Route::post('/update-subcategories',[SubCategoryController::class,'updateSubCategories']);

    Route::get('/sub-category-types',[SubCategoryController::class,'subcategoryTypes']);
    Route::post('/save-subcategoryType',[SubCategoryController::class,'saveSubCategoryType']);
    Route::post('/update-subcategory-types',[SubCategoryController::class,'updateSubCategoryType']);

    Route::get('/sales-list',[ProductController::class,'getProdFavourites']);
    Route::get('/best-selling-list',[ProductController::class,'getProdSellingList']);
    Route::get('/monthly-sales-list',[ProductController::class,'getProdMonthlySales']);
    Route::get('/new-product-list',[ProductController::class,'getNewProductsList']);
    Route::get('/add-to-favourite/{id}',[ProductController::class,'addProdFavourites'])->name('product.add_favourite');
    Route::get('/remove-from-favourite/{id}',[ProductController::class,'deleteProdFavourites'])->name('product.remove_favourite');
    Route::get('/add-to-sale/{id}',[ProductController::class,'addProdSale'] )->name('product.add_Sale');
    Route::get('/remove-from-sale/{id}',[ProductController::class,'deleteProdSale'] )->name('product.remove_Sale');

    Route::get('/add-to-monthly-sale/{id}',[ProductController::class,'addProdMonthlySales'] )->name('product.add_monthlySale');
    Route::get('/remove-from-monthly-sale/{id}',[ProductController::class,'deleteProdMonthlySales'] )->name('product.remove_monthlySale');

    Route::get('/add-to-new-product/{id}',[ProductController::class,'addNewProdList'])->name('product.add_to_New');
    Route::get('/remove-from-new-product/{id}',[ProductController::class,'deleteNewProdList'])->name('product.remove_from_new');

    Route::post('/update-sales-discount',[ProductController::class,'updateSaleDiscount']);
    Route::post('/update-monthly-sales-discount',[ProductController::class,'updateMonthlySaleDiscount']);

    Route::get('/subCategoryType-operations',[SubCategoryController::class,'subCategoryTypesCRUD']);
    Route::post('/update-subCategoryType',[SubCategoryController::class,'updatesubCategoryType']);
    Route::get('/product-type',[SubCategoryController::class,'productTypes']);
    Route::get('product-type/create', [SubCategoryController::class, 'addproductType']);
    Route::post('store-product-type', [SubCategoryController::class, 'saveproductType'])->name('product-type_store');
    Route::post('/update-producttype',[SubCategoryController::class,'updateproducttype']);
    Route::get('/customers',[OrderController::class,'allCustomers']);
    Route::get('/customers/{id}',[OrderController::class,'editCustomer'])->name('user.edit');
    Route::get('/set-as-service-partners/{id}',[OrderController::class,'setServicePartner'])->name('set_servicePartner');
    Route::get('/set-as-customers/{id}',[OrderController::class,'setRoleCustomer'])->name('set_servicePartner');
    Route::post('/customers/{id}',[OrderController::class,'updateCustomer'])->name('customer_update');
    Route::get('/service-partners-users',[OrderController::class,'ServicePartnersUsers']);


    Route::get('blog-categories',[BlogController::class,'blogCategories']);
    Route::get('blog/create',[BlogController::class,'addBlogCategory']);
    Route::post('store-blog-category', [BlogController::class, 'saveBlogCategory'])->name('blog_category_store');
    Route::post('update-blog-category', [BlogController::class, 'updateBlogCategory'])->name('blog_category_update');
    Route::get('blog-type',[BlogController::class,'blogType']);
    Route::get('blogtype/create',[BlogController::class,'addBlogType']);
    Route::post('store-blog-type', [BlogController::class, 'saveBlogType'])->name('blog_type_store');
    Route::post('update-blog-type', [BlogController::class, 'updateBlogType'])->name('blog_type_update');
    Route::get('blog-faq',[BlogController::class,'blogfaq']);
    Route::get('blog-faq/create',[BlogController::class,'AddBlogFaq']);
    Route::post('store-blog-faq', [BlogController::class, 'saveBlogFaq'])->name('blog_faq_store');
    Route::post('update-blog-faq', [BlogController::class, 'updateBlogFaq'])->name('blog_faq_update');
    Route::get('resource-center-admin',[BlogController::class,'rcBlogAdmin']);
    Route::get('resource-center-admin/create',[BlogController::class,'rcBlogAdminCreate']);
    Route::post('store-resource-center-admin', [BlogController::class, 'saveRCBlogAdmin'])->name('rcAdmin_store');
    Route::post('update-resource-center-admin', [BlogController::class, 'updateRCBlogAdmin'])->name('rcAdmin_update');
    Route::get('add-blog-content/{id}',[BlogController::class,'addBlogContent'])->name('add_blog_content');
    Route::post('store-blog-content', [BlogController::class, 'storeBlogContent'])->name('store_blog_content');
    Route::get('show-blog-content/{id}', [BlogController::class, 'showBlogContent'])->name('show_blog_content');
    Route::post('update-blog-content', [BlogController::class, 'updateBlogContent'])->name('update_blog_content');
    Route::get('blog-info-delete/{id}', [BlogController::class, 'blogInfoDelete'])->name('blogInfo_delete');


    Route::get('my-company-services',[ServiceController::class,'services']);
    Route::post('update-service-details', [ServiceController::class, 'updateServiceDetails'])->name('update_service_details');
    Route::get('repair_service_admin',[ServiceController::class,'repairServiceAdmin'])->name('repair_service_admin');
    Route::post('update-heading-repair-service',[ServiceController::class,'updateHeadingrepairService'])->name('update_heading_repair_service');
    Route::post('update-information1-repair-service',[ServiceController::class,'updateInfo1RepairService'])->name('update_info1_repair_service');
    Route::post('update-img1-repair-service',[ServiceController::class,'updateImg1RepairService'])->name('update_img1_repair_service');
    Route::post('update-information2-repair-service',[ServiceController::class,'updateInfo2RepairService'])->name('update_info2_repair_service');
    Route::post('update-img2-repair-service',[ServiceController::class,'updateImg2RepairService'])->name('update_img2_repair_service');
    Route::get('vital_care_admin',[ServiceController::class,'vitalCareAdmin'])->name('vital_care_admin');
    Route::post('update-heading1-vital-care',[ServiceController::class,'updateHeading1vitalCare'])->name('update_heading1_vital_care');
    Route::post('update_info1_vital_care',[ServiceController::class,'updateInfo1VitalCare'])->name('update_info1_vital_care');
    Route::post('update_img1_vital_care',[ServiceController::class,'updateImg1VitalCare'])->name('update_img1_vital_care');
    Route::post('update-heading2-vital-care',[ServiceController::class,'updateHeading2vitalCare'])->name('update_heading2_vital_care');
    Route::post('update_info2_vital_care',[ServiceController::class,'updateInfo2VitalCare'])->name('update_info2_vital_care');
    Route::post('update_img2_vital_care',[ServiceController::class,'updateImg2VitalCare'])->name('update_img2_vital_care');
    Route::post('update-heading3-vital-care',[ServiceController::class,'updateHeading3vitalCare'])->name('update_heading3_vital_care');
    Route::post('update_info3_vital_care',[ServiceController::class,'updateInfo3VitalCare'])->name('update_info3_vital_care');
    Route::post('update_img3_vital_care',[ServiceController::class,'updateImg3VitalCare'])->name('update_img3_vital_care');
    Route::post('update_heading4_vital_care',[ServiceController::class,'updateHeading4vitalCare'])->name('update_heading4_vital_care');
    Route::post('update_info4_vital_care',[ServiceController::class,'updateInfo4VitalCare'])->name('update_info4_vital_care');
    Route::post('update_img4_vital_care',[ServiceController::class,'updateImg4VitalCare'])->name('update_img4_vital_care');
    Route::get('dog_grooming_admin',[ServiceController::class,'dogGroomingAdmin'])->name('dog_grooming_admin');

    Route::post('update-heading1-dog-grooming',[ServiceController::class,'updateHeading1DogGrooming'])->name('update_heading1_dog_grooming');
    Route::post('update_info1_dog_grooming',[ServiceController::class,'updateInfo1DogGrooming'])->name('update_info1_dog_grooming');
    Route::post('update_img1_dog_grooming',[ServiceController::class,'updateImg1DogGrooming'])->name('update_img1_dog_grooming');
    Route::post('update-heading2-dog_grooming',[ServiceController::class,'updateHeading2DogGrooming'])->name('update_heading2_dog_grooming');
    Route::post('update_info2_dog_grooming',[ServiceController::class,'updateInfo2DogGrooming'])->name('update_info2_dog_grooming');
    Route::post('update_img2_dog_grooming',[ServiceController::class,'updateImg2DogGrooming'])->name('update_img2_dog_grooming');
    Route::post('update-heading3-dog_grooming',[ServiceController::class,'updateHeading3DogGrooming'])->name('update_heading3_dog_grooming');
    Route::post('update_info3_dog_grooming',[ServiceController::class,'updateInfo3DogGrooming'])->name('update_info3_dog_grooming');
    Route::post('update_img3_dog_grooming',[ServiceController::class,'updateImg3DogGrooming'])->name('update_img3_dog_grooming');
    Route::post('update_heading4_dog_grooming',[ServiceController::class,'updateHeading4DogGrooming'])->name('update_heading4_dog_grooming');
    Route::post('update_info4_dog_grooming',[ServiceController::class,'updateInfo4DogGrooming'])->name('update_info4_dog_grooming');
    Route::post('update_img4_dog_grooming',[ServiceController::class,'updateImg4DogGrooming'])->name('update_img4_dog_grooming');
    Route::post('update_heading5_dog_grooming',[ServiceController::class,'updateHeading5DogGrooming'])->name('update_heading5_dog_grooming');
    Route::post('update_info5_dog_grooming',[ServiceController::class,'updateInfo5DogGrooming'])->name('update_info5_dog_grooming');
    Route::post('update_img5_dog_grooming',[ServiceController::class,'updateImg5DogGrooming'])->name('update_img5_dog_grooming');
    Route::post('update_heading6_dog_grooming',[ServiceController::class,'updateHeading6DogGrooming'])->name('update_heading6_dog_grooming');
    Route::post('update_info6_dog_grooming',[ServiceController::class,'updateInfo6DogGrooming'])->name('update_info6_dog_grooming');
    Route::post('update_img6_dog_grooming',[ServiceController::class,'updateImg6DogGrooming'])->name('update_img6_dog_grooming');
    Route::post('update_heading7_dog_grooming',[ServiceController::class,'updateHeading7DogGrooming'])->name('update_heading7_dog_grooming');
    Route::post('update_info7a_dog_grooming',[ServiceController::class,'updateInfo7aDogGrooming'])->name('update_info7a_dog_grooming');
    Route::post('update_img7a_dog_grooming',[ServiceController::class,'updateImg7aDogGrooming'])->name('update_img7a_dog_grooming');
    Route::post('update_info7b_dog_grooming',[ServiceController::class,'updateInfo7bDogGrooming'])->name('update_info7b_dog_grooming');
    Route::post('update_img7b_dog_grooming',[ServiceController::class,'updateImg7bDogGrooming'])->name('update_img7b_dog_grooming');
    Route::post('update_info7c_dog_grooming',[ServiceController::class,'updateInfo7cDogGrooming'])->name('update_info7c_dog_grooming');
    Route::post('update_img7c_dog_grooming',[ServiceController::class,'updateImg7cDogGrooming'])->name('update_img7c_dog_grooming');
    Route::post('update_info7d_dog_grooming',[ServiceController::class,'updateInfo7dDogGrooming'])->name('update_info7d_dog_grooming');
    Route::post('update_img7d_dog_grooming',[ServiceController::class,'updateImg7dDogGrooming'])->name('update_img7d_dog_grooming');
    Route::post('update_info7e_dog_grooming',[ServiceController::class,'updateInfo7eDogGrooming'])->name('update_info7e_dog_grooming');
    Route::post('update_img7e_dog_grooming',[ServiceController::class,'updateImg7eDogGrooming'])->name('update_img7e_dog_grooming');
    Route::post('update_info7f_dog_grooming',[ServiceController::class,'updateInfo7fDogGrooming'])->name('update_info7f_dog_grooming');
    Route::post('update_img7f_dog_grooming',[ServiceController::class,'updateImg7fDogGrooming'])->name('update_img7f_dog_grooming');

    Route::post('update_heading8_dog_grooming',[ServiceController::class,'updateHeading8DogGrooming'])->name('update_heading8_dog_grooming');

    Route::post('update_info8a_dog_grooming',[ServiceController::class,'updateInfo8aDogGrooming'])->name('update_info8a_dog_grooming');
    Route::post('update_info8b_dog_grooming',[ServiceController::class,'updateInfo8bDogGrooming'])->name('update_info8b_dog_grooming');
    Route::post('update_info8c_dog_grooming',[ServiceController::class,'updateInfo8cDogGrooming'])->name('update_info8c_dog_grooming');
    Route::post('update_info8d_dog_grooming',[ServiceController::class,'updateInfo8dDogGrooming'])->name('update_info8d_dog_grooming');
    Route::post('update_info8e_dog_grooming',[ServiceController::class,'updateInfo8eDogGrooming'])->name('update_info8e_dog_grooming');
    Route::post('update_info8f_dog_grooming',[ServiceController::class,'updateInfo8fDogGrooming'])->name('update_info8f_dog_grooming');
    Route::post('update_info8g_dog_grooming',[ServiceController::class,'updateInfo8gDogGrooming'])->name('update_info8g_dog_grooming');
    Route::post('update_info8h_dog_grooming',[ServiceController::class,'updateInfo8hDogGrooming'])->name('update_info8h_dog_grooming');

    Route::post('update_section-1_dog_grooming',[ServiceController::class,'updateSection1dogGrooming'])->name('update_section-1_dog_grooming');
    Route::post('update_section-2_dog_grooming',[ServiceController::class,'updateSection2dogGrooming'])->name('update_section-2_dog_grooming');

    Route::post('update_info9_dog_grooming',[ServiceController::class,'updateInfo9DogGrooming'])->name('update_info9_dog_grooming');
    Route::post('update_img9_dog_grooming',[ServiceController::class,'updateImg9DogGrooming'])->name('update_img9_dog_grooming');

    Route::post('update_info10_dog_grooming',[ServiceController::class,'updateInfo10DogGrooming'])->name('update_info10_dog_grooming');
    Route::post('update_img10_dog_grooming',[ServiceController::class,'updateImg10DogGrooming'])->name('update_img10_dog_grooming');

    Route::post('update_section-3_dog_grooming',[ServiceController::class,'updateSection3dogGrooming'])->name('update_section-3_dog_grooming');
    Route::post('update_img11_dog_grooming',[ServiceController::class,'updateImg11DogGrooming'])->name('update_img11_dog_grooming');

    Route::post('update_info11_dog_grooming',[ServiceController::class,'updateInfo11DogGrooming'])->name('update_info11_dog_grooming');
    Route::post('update_info12_dog_grooming',[ServiceController::class,'updateInfo12DogGrooming'])->name('update_info12_dog_grooming');
    Route::post('update_info13_dog_grooming',[ServiceController::class,'updateInfo13DogGrooming'])->name('update_info13_dog_grooming');
    Route::post('update_info14_dog_grooming',[ServiceController::class,'updateInfo14DogGrooming'])->name('update_info14_dog_grooming');
    Route::post('update_info15_dog_grooming',[ServiceController::class,'updateInfo15DogGrooming'])->name('update_info15_dog_grooming');
    Route::post('update_info16_dog_grooming',[ServiceController::class,'updateInfo16DogGrooming'])->name('update_info16_dog_grooming');
    Route::post('update_info17_dog_grooming',[ServiceController::class,'updateInfo17DogGrooming'])->name('update_info17_dog_grooming');
    Route::post('update_section-4_dog_grooming',[ServiceController::class,'updateSection4dogGrooming'])->name('update_section4_dog_grooming');
    Route::post('update_info18_dog_grooming',[ServiceController::class,'updateInfo18DogGrooming'])->name('update_info18_dog_grooming');
    Route::post('update_img12_dog_grooming',[ServiceController::class,'updateImg12DogGrooming'])->name('update_img12_dog_grooming');
    Route::post('update_info19_dog_grooming',[ServiceController::class,'updateInfo19DogGrooming'])->name('update_info19_dog_grooming');
    Route::post('update_img13_dog_grooming',[ServiceController::class,'updateImg13DogGrooming'])->name('update_img13_dog_grooming');
    Route::post('update_info20_dog_grooming',[ServiceController::class,'updateInfo20DogGrooming'])->name('update_info20_dog_grooming');
    Route::post('update_img14_dog_grooming',[ServiceController::class,'updateImg14DogGrooming'])->name('update_img14_dog_grooming');

    Route::get('veterinary_services_admin',[VeterinaryController::class,'veterinaryServicesAdmin'])->name('veterinary_services_admin');
    Route::post('update_info1_veterinary_care',[VeterinaryController::class,'updateInfo1VeterinaryService'])->name('update_info1_veterinary_care');
    Route::post('update_img1_veterinary_care',[VeterinaryController::class,'updateImg1VeterinaryService'])->name('update_img1_veterinary_care');
    Route::post('update_info2_veterinary_care',[VeterinaryController::class,'updateInfo2VeterinaryService'])->name('update_info2_veterinary_care');
    Route::post('update_img2_veterinary_care',[VeterinaryController::class,'updateImg2VeterinaryService'])->name('update_img2_veterinary_care');

    Route::get('adoptions_admin',[AdoptionController::class,'adoptionServiceAdmin'])->name('adoptions_admin');
    Route::post('update_info1_adoptions',[AdoptionController::class,'updateInfo1Adoptions'])->name('update_info1_adoptions');
    Route::post('update_img1_adoptions',[AdoptionController::class,'updateImg1Adoptions'])->name('update_img1_adoptions');

    Route::get('dog_training_admin',[DogTrainingController::class,'dogTrainingAdmin'])->name('dog_training_admin');
    Route::post('update_topic_dog_training',[DogTrainingController::class,'updateTopicDogTraining'])->name('update_topic_dog_training');
    Route::post('update_info_dog_training',[DogTrainingController::class,'updateInfoDogTraining'])->name('update_info_dog_training');
    Route::post('update_img_dog_training',[DogTrainingController::class,'updateImgDogTraining'])->name('update_img_dog_training');

    Route::post('update_trainerimg_dog_training',[DogTrainingController::class,'updateTrainerImgDogTraining'])->name('update_trainerimg_dog_training');
    Route::post('update_infoTrainer_dog_training',[DogTrainingController::class,'update_infoTrainer_dog_training'])->name('update_infoTrainer_dog_training');

    Route::post('update_point_instoreTraining',[DogTrainingController::class,'updatePointInstoreTraining'])->name('update_point_instoreTraining');
    Route::post('update_infoCard_instoreTraining',[DogTrainingController::class,'updateInfoCardInstoreTraining'])->name('update_infoCard_instoreTraining');
    Route::post('update_imgCard_instoreTraining',[DogTrainingController::class,'updateImgCardInstoreTraining'])->name('update_imgCard_instoreTraining');
    Route::get('diy_dog_wash_admin',[ServiceController::class,'diyDogWashAdmin'])->name('diy_dog_wash_admin');

    Route::post('update_imageIcon_instoreTraining',[DogTrainingController::class,'updateImgIconInstoreTraining'])->name('update_imageIcon_instoreTraining');
    Route::get('inStore-dog-training-admin',[DogTrainingController::class,'inStoreDogTraining'])->name('instoreTrainingAdmin');
    Route::get('online-dog-training-admin',[DogTrainingController::class,'onlineDogTraining'])->name('onlineTrainingAdmin');

    Route::get('new-pet-guides-admin',[PetGuideController::class,'newPetGuidesAdmin'])->name('new_pet_guides_admin');
    Route::post('update_petGuide_details',[PetGuideController::class,'updatePetGuideDetails'])->name('update_petGuide_details');

    Route::get('new-dog-guide-admin',[PetGuideController::class,'newDogGuidesAdmin'])->name('new_dog_guide_admin');
    Route::get('new-cat-guide-admin',[PetGuideController::class,'newCatGuidesAdmin'])->name('new_cat_guide_admin');
    Route::get('new-reptile-guide-admin',[PetGuideController::class,'newReptileGuidesAdmin'])->name('new_reptile_guide_admin');
    Route::get('new-bird-guide-admin',[PetGuideController::class,'newBirdGuidesAdmin'])->name('new_bird_guide_admin');
    Route::get('saltwater-fish-guide-admin',[PetGuideController::class,'newFishGuidesAdmin'])->name('new_fish_guide_admin');
    Route::get('new-rabit-guide-admin',[PetGuideController::class,'newRabitGuidesAdmin'])->name('new_rabit_guide_admin');


    Route::get('/offers', [OfferController::class,'myOffers']);
    Route::post('offers/store',[OfferController::class,'saveOffers'])->name('offer_store');
    Route::get('offer/{id}', [OfferController::class, 'editOffer'])->name('offer.edit');

    Route::post('offer_update/{id}', [OfferController::class, 'OfferUpdate'])->name('offer_update');
    Route::get('offer_delete/{id}', [OfferController::class, 'OfferDelete'])->name('offer_delete');

    Route::get('/dashboard',[OrderController::class,'showOrders']);
    Route::get('inventory', [InventoryController::class, 'index']);
    Route::get('inventory-edit/{id}', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::post('inventory_update/{id}', [InventoryController::class, 'inventory_update'])->name('inventory_update');
    Route::get('orders/{id}', [orderController::class,'showSingleOrder'])->name('order.show');
    Route::get('order-edit/{id}', [orderController::class, 'editOrdStatus'])->name('order.edit');
    Route::post('order-status/{id}', [orderController::class,'updateStatus'])->name('order.status');
    Route::get('/banner-images',[AdminWebPageController::class,'BannerImg']);
    Route::post('update_banner_image', [AdminWebPageController::class,'BannerImg'])->name('update_banner_image');

    Route::get('booking-services', [FullCalenderController::class, 'bookService']);
    Route::post('update_booking_service', [FullCalenderController::class, 'updateBookService'])->name('update_booking_service');
    Route::get('cities', [FullCalenderController::class, 'cities']);
    Route::get('cities/create', [FullCalenderController::class, 'AddCity']);
    Route::post('save_city', [FullCalenderController::class, 'saveCity'])->name('save_city');
    Route::post('/update-city',[FullCalenderController::class,'updateCity']);
    Route::get('suburbs', [FullCalenderController::class, 'suburbs']);
    Route::get('suburbs/create', [FullCalenderController::class, 'AddSuburb']);
    Route::post('save_suburb', [FullCalenderController::class, 'saveSuburb'])->name('save_suburb');
    Route::post('/update-suburb',[FullCalenderController::class,'updateSuburb']);
    Route::get('service-locations-admin', [FullCalenderController::class, 'serviceLocations']);
    Route::get('service-locations-admin/create', [FullCalenderController::class, 'AddServiceLocations']);
    Route::post('get-city-dropdown', [FullCalenderController::class, 'cityDropdown'])->name('city_dropdown');
    Route::post('get-suburb-dropdown', [FullCalenderController::class, 'suburbDropdown'])->name('suburb_dropdown');
    Route::post('get-location-dropdown', [FullCalenderController::class, 'locationDropdown'])->name('location_dropdown');
    Route::post('save_service_location', [FullCalenderController::class, 'saveServiceLocation'])->name('save_service_location');
    Route::post('/update-service-location',[FullCalenderController::class,'updateServiceLocation']);

    Route::get('service-timings/{id}', [FullCalenderController::class, 'servTimings']);
    Route::get('service-timings/create/{id}', [FullCalenderController::class, 'AddServTimings']);
    Route::post('save_service_timings', [FullCalenderController::class, 'saveServTimings'])->name('save_service_timings');
    Route::post('/update-service-timings',[FullCalenderController::class,'updateServTimings']);

    Route::get('animal-types', [FullCalenderController::class, 'animalTypes']);
    Route::get('animal-types/create', [FullCalenderController::class, 'AddAnimalType']);
    Route::post('save_animal_type', [FullCalenderController::class, 'saveAnimalType'])->name('save_animal_type');
    Route::post('/update-animal-type',[FullCalenderController::class,'updateAnimalType']);
    Route::get('animal-breeds', [FullCalenderController::class, 'animalBreeds']);
    Route::get('animal-breeds/create', [FullCalenderController::class, 'AddAnimalBreed']);
    Route::post('save_animal_breed', [FullCalenderController::class, 'saveAnimalBreed'])->name('save_animal_breed');
    Route::post('/update-animal-breed',[FullCalenderController::class,'updateAnimalBreed']);
    Route::get('animal-colours', [FullCalenderController::class, 'animalColours']);
    Route::get('animal-colours/create', [FullCalenderController::class, 'AddAnimalColour']);
    Route::post('save_animal_colour', [FullCalenderController::class, 'saveAnimalColour'])->name('save_animal_colour');
    Route::post('/update-animal-colour',[FullCalenderController::class,'updateAnimalColour']);
    Route::get('pet-details-admin', [FullCalenderController::class, 'petDetails']);
    Route::get('pet-details-admin/create', [FullCalenderController::class, 'AddPetDetail']);
    Route::post('save_pet_details', [FullCalenderController::class, 'savePetDetails'])->name('save_pet_details');
    Route::post('get-animalBreed-dropdown', [FullCalenderController::class, 'animalBreedDropdown'])->name('animalBreed_dropdown');
    Route::post('/update-pet-details',[FullCalenderController::class,'updatePetDetails']);
    Route::get('image-gallery-admin/{id}', [FullCalenderController::class, 'petImageGallery'])->name('pet.gallery');
    Route::post('pet-image-gallery/{id}', [FullCalenderController::class, 'petGallery_Update'])->name('petGallery_update');

    Route::get('appointment-types', [FullCalenderController::class, 'appointmentTypes']);
    Route::get('appointment-types/create', [FullCalenderController::class, 'AddAppointmentTypes']);
    Route::post('save_appointmentTypes', [FullCalenderController::class, 'saveAppointmentTypes'])->name('save_AppointmentTypes');
    Route::post('/update-appointment-types',[FullCalenderController::class,'updateAppointmentTypes']);

    Route::get('edit-available-time/{id}', [FullCalenderController::class, 'editAvailableTime'])->name('edit_availableTime');
    Route::post('update-available-time/{id}', [FullCalenderController::class, 'updateAvailableTime'])->name('update_availableTime');

    Route::get('assign-user-roles/{id}', [FullCalenderController::class, 'servicePartnerRole']);
    Route::post('get-store-dropdown', [FullCalenderController::class, 'storeDropdown'])->name('store_dropdown');
    Route::post('role-store/{id}', [FullCalenderController::class, 'roleStore']);
    Route::get('service-list/{id}', [OrderController::class, 'serviceList']);
    Route::post('/update-store-service', [OrderController::class, 'updateStoreRole']);



    Route::get('/booking-dashboard',[FullCalenderController::class,'allAppointments']);
});


Route::group(['middleware'=>['auth','booking']], function () {
    Route::get('/booking-dashboard/{id}',[FullCalenderController::class,'SpecificAppointments'])->name('booking.dashboard');
    Route::get('full-calender', [FullCalenderController::class, 'index']);
    Route::post('full-calender/action', [FullCalenderController::class, 'action']);
    Route::get('our-service-locations', [FullCalenderController::class, 'OurServiceLocations']);
    Route::get('our-service-timings', [FullCalenderController::class, 'OurServTimings']);
    Route::get('edit-available-time/{id}', [FullCalenderController::class, 'editAvailableTime'])->name('edit_availableTime');
    Route::post('update-available-time/{id}', [FullCalenderController::class, 'updateAvailableTime'])->name('update_availableTime');
    Route::post('/update-service-timings',[FullCalenderController::class,'updateServTimings']);
});
