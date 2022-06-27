<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController; 
use App\Http\Controllers\PendingOrdersController; 
use App\Http\Controllers\ProcessingOrdersController;
use App\Http\Controllers\ReadyForPackagingController;
use App\Http\Controllers\ReadyToDeliveredController;
use App\Http\Controllers\OnHoldOrdersController;
use App\Http\Controllers\UnderReviewOrdersController;
use App\Http\Controllers\DeliveredOrdersController;
use App\Http\Controllers\InTransitOrdersController;
use App\Http\Controllers\InHouseOrdersController;
use App\Http\Controllers\ManageOrderController;
use App\Http\Controllers\ReturningOrdersController;
use App\Http\Controllers\ManageCourierController;
use App\Http\Controllers\NoStatusOrdersController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\DeliveryReportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\InStockOrderController;
use App\Http\Controllers\CourierWiseOrders\JananiController;
use App\Http\Controllers\CourierWiseOrders\SundarbanController;
use App\Http\Controllers\CourierWiseOrders\SAparibahanController;



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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::group(['middleware'=>'alreadyLoggedIn'],function(){  
    Route::get('/',[LoginController::class,'loginPage']);
});

// Route::get('/',[LoginController::class,'loginPage'])->middleware('alreadyLoggedIn');
Route::post('user/login',[LoginController::class,'login'])->name('user.login'); 
// Middleware Started................................................................................................................
Route::group(['middleware'=>'isLoggedIn'],function(){      
Route::get('/dashboard',[LoginController::class,'dashboard'])->name('user.dsahboard');
Route::get('user/logout',[LoginController::class,'logout'])->name('user.logout');
//Pending Order Routes.....................................................................
Route::get('/pending-orders',[PendingOrdersController::class,'pendingOrders'])->name('pending.orders');
Route::get('edit_pending_order/{id}',[PendingOrdersController::class,'editPendingOrder'])->name('edit.pending.order');
Route::put('update-pending-order',[PendingOrdersController::class,'updatePendingOrder'])->name('update.pending.order');
Route::get('view-single-pending-order/{id}',[PendingOrdersController::class,'viewSinglePendingOrder'])->name('view.single.pending.order');
Route::get('edit_pending_order_details/{id}',[PendingOrdersController::class,'editPendingOrderDetails'])->name('edit.pending.order.deatils');
Route::put('update-pending-order-details',[PendingOrdersController::class,'updatePendingOrderDetails'])->name('update.pending.order.deatils');
Route::get('edit-returned-pending-order/{id}',[PendingOrdersController::class,'editReturnedPendingOrder'])->name('edit.returned.pending.order');
Route::put('update-pending-order-returned',[PendingOrdersController::class,'updatereturnedPendingOrder'])->name('update.returned.pending.order');
// Route::get('purchased-pending-order/{id}',[PendingOrdersController::class,'purchasedPendingOrder'])->name('purchased.pending.order');

// .............................................................................................................................
//Processing Order Routes.....................................................................
Route::get('/processing-orders',[ProcessingOrdersController::class,'processingOrders'])->name('processing.orders');
Route::get('edit_processing_order/{id}',[ProcessingOrdersController::class,'editProcessingOrders'])->name('edit.processing.orders'); 
Route::put('update-processing-order',[ProcessingOrdersController::class,'updateProcessingOrder'])->name('update.processing.orders');
Route::get('view-single-processing-order/{id}',[ProcessingOrdersController::class,'ViewSingleProcessingOrder'])->name('view.single.processing.orders');
Route::get('/edit-processing-order-deatail/{id}',[ProcessingOrdersController::class,'editProcessingOrderDetails'])->name('edit.processing.order.deatils');
Route::put('update-processing-order-details',[ProcessingOrdersController::class,'updateProcessingOrderDetails'])->name('update.processing.order.deatils');
Route::get('processing-order-returned-edit/{id}',[ProcessingOrdersController::class,'editProcessingOrderReturned'])->name('edit.processing.order.returned'); 
Route::put('update-processing-order-returned',[ProcessingOrdersController::class,'updateProcessingOrderReturned'])->name('update.processing.order.returned');


// .............................................................................................................................
//Ready-For-packaging Order Routes.....................................................................
Route::get('/ready-for-packaging',[ReadyForPackagingController::class,'readyForPackaging'])->name('ready.for.packaging.order');
Route::get('edit-ready-for-packaging-order/{id}',[ReadyForPackagingController::class,'editReadyForPackaging'])->name('edit.ready.for.packaging.order');
Route::put('update-ready-for-packaging-order',[ReadyForPackagingController::class,'updateReadyForPackagingOrder'])->name('update.ready.for.packaging.order');
Route::get('view-single-packaging-order/{id}',[ReadyForPackagingController::class,'viewSinglePackagingOrder'])->name('view.single.packaging.order');
Route::get('edit-packaging-order-deatail/{id}',[ReadyForPackagingController::class,'editPackagingOrderDetails'])->name('edit.packaging.order.details');
Route::put('update-packaging-order-details',[ReadyForPackagingController::class,'updatePackagingOrderDetails'])->name('update.packaging.order.deatils');
Route::get('returned-packaging-order/{id}',[ReadyForPackagingController::class,'returnedPackagingOrder'])->name('returned.packaging.order');
Route::put('update-packaging-order-returned',[ReadyForPackagingController::class,'updateReturnedPackagingOrder'])->name('update.returned.packaging.order');
Route::get('edit-purchased-status/{id}',[ReadyForPackagingController::class,'editPurchasedStatus'])->name('edit.purchased.status');
Route::put('update-packaging-order-purchase-status',[ReadyForPackagingController::class,'updatePurchasedStatus'])->name('update.purchased.status');


// .............................................................................................................................
//Ready To Deliver Order Routes.....................................................................
Route::get('/ready-to-Deliver',[ReadyToDeliveredController::class,'readyToDeliver'])->name('ready.to.deliver');
Route::get('ready-to-deliver-order/{id}',[ReadyToDeliveredController::class,'editReadyToDeliver'])->name('edit.ready.to.deliver');
Route::put('update-ready-to-deliver-order',[ReadyToDeliveredController::class,'updateReadyToDeliverOrder'])->name('update.ready.to.deliver.order');
Route::get('view-single-ready-to-deliver-order/{id}',[ReadyToDeliveredController::class,'viewSingleReadyToDeliver'])->name('view.single.ready.to.deliver');
Route::get('edit-ready-to-deliver-order-details/{id}',[ReadyToDeliveredController::class,'editReadyToDeliverDetails'])->name('edit.ready.to.deliver.details');
Route::put('update-ready-to-deliver-order-details',[ReadyToDeliveredController::class,'updateReadyToDeliverOrderdetails'])->name('update.ready.to.deliver.order.details');
Route::get('edit-returned-ready-to-deliver-order/{id}',[ReadyToDeliveredController::class,'editReturnedReadyToDeliver'])->name('edit.returned.ready.to.deliver');
Route::put('update-ready-to-deliver-order-returned',[App\Http\Controllers\ReadyToDeliveredController::class,'updateReadyToDeliverReturnedOrder'])->name('update.ready.to.deliver.returned.order');
Route::get('append-id-to-rtd-update-status/{id}',[ReadyToDeliveredController::class,'appendId'])->name('append.id');
Route::put('update-purchase-status-rtd',[ReadyToDeliveredController::class,'updatePurchasedStatusRtd'])->name('update.purchased.status.rtd');
 

// .............................................................................................................................
//On-Hold Order Routes.....................................................................
Route::get('/on-hold-orders',[OnHoldOrdersController::class,'onHoldOrders'])->name('on.hold.orders');
Route::get('edit-on-hold-orders/{id}',[OnHoldOrdersController::class,'editOnHoldOrders'])->name('edit.on.hold.orders');
Route::put('update-on-hold-order',[OnHoldOrdersController::class,'updateOnHoldOrders'])->name('update.on.hold.orders');
Route::get('view-on-hold-order-details/{id}',[OnHoldOrdersController::class,'viewOnHoldOrderDetails'])->name('view.on.hold.order');
Route::get('edit-on-hold-order-details/{id}',[OnHoldOrdersController::class,'editOnHoldOrderDetails'])->name('edit.on.hold.order.details');
Route::put('update-on-hold-order-details',[OnHoldOrdersController::class,'updateOnHoldOrderDetails'])->name('update.on.hold.order.details');
Route::get('edit-returned-on-hold-order/{id}',[OnHoldOrdersController::class,'editOnHoldOrderReturned'])->name('edit.on.hold.order.returned');
Route::put('update-on-hold-order-returned',[OnHoldOrdersController::class,'updateOnHoldOrderReturned'])->name('update.on.hold.order.returned');
Route::get('ohder-purchase-status-edit/{id}',[OnHoldOrdersController::class,'editPurchaseStatusohder'])->name('edit.purchase.status.ohder');
Route::put('ohder-update-purchase-status',[OnHoldOrdersController::class,'updateOHOPurchaseStatus'])->name('oho.update.purchase.status');

// .............................................................................................................................
//UnderReviewOrders Routes.....................................................................
Route::get('/under-review-orders',[UnderReviewOrdersController::class,'underReviewOrders'])->name('under.review.orders');
Route::get('edit-under-review-orders/{id}',[UnderReviewOrdersController::class,'editUnderReviewOrders'])->name('edit.under.review.orders');
Route::put('update-under-review-order',[UnderReviewOrdersController::class,'UpdateUnderReviewOrders'])->name('update.under.review.orders');
Route::get('view-under-review-order-details/{id}',[UnderReviewOrdersController::class,'viewSingleUnderReviewOrderDetails'])->name('single.under.review.order.details');
Route::get('edit-under-review-order-details/{id}',[UnderReviewOrdersController::class,'editUnderReviewOrderDetails'])->name('edit.under.review.order.details');
Route::put('update-under-review-order-details',[UnderReviewOrdersController::class,'UpdateUnderReviewOrderDetails'])->name('update.under.review.order.details');
Route::get('edit-returned-under-review-order/{id}',[UnderReviewOrdersController::class,'editUnderReviewOrderReturn'])->name('edit.under.review.order.returned');
Route::put('update-under-review-order-returned',[UnderReviewOrdersController::class,'updateUnderReviewReturned'])->name('update.under.review.returned');
Route::get('underReviewOrder-purchase-status-edit/{id}',[UnderReviewOrdersController::class,'editPurchaseStatusURO'])->name('edit.purchase.status.uro');
Route::put('underReviewOrder-update-purchase-status',[UnderReviewOrdersController::class,'UpdatePurchaseStatusURO'])->name('update.purchase.status.uro');

// .............................................................................................................................
//Delivered Orders Routes.....................................................................
Route::get('/delivered-orders',[DeliveredOrdersController::class,'deliveredOrders'])->name('delivered.orders');

// .............................................................................................................................
//In Transit Orders Routes.....................................................................
Route::get('/in-transit-orders',[InTransitOrdersController::class,'InTransitOrders'])->name('in.transit.orders');
Route::get('edit-in-transit-orders/{id}',[InTransitOrdersController::class,'editInTransitOrder'])->name('edit.in.transit.orders');
Route::put('/update-in-transit-order',[InTransitOrdersController::class,'updateInTransitOrders'])->name('update.in.transit.orders');
Route::get('view-single-in-transit-order/{id}',[InTransitOrdersController::class,'viewSingleInTransitOrder'])->name('view.single.in.transit.order');
Route::get('edit-in-transit-order-details/{id}',[InTransitOrdersController::class,'editInTransitOrderDetails'])->name('edit.in.transit.order.details');
Route::put('update-in-transit-order-details',[InTransitOrdersController::class,'updateInTransitOrderDetails'])->name('update.in.transit.order.details');
Route::get('edit-in-transit-returned-order/{id}',[InTransitOrdersController::class,'editInTransitReturnedOrder'])->name('edit.in.transit.returned.order');
Route::put('update-in-transit-order-returned',[InTransitOrdersController::class,'updateInTransitReturnedOrder'])->name('update.in.transit.returned.order');
Route::get('intro-purchase-status-edit/{id}',[InTransitOrdersController::class,'editPurchaseStatusIntro'])->name('edit.purchase.status.intro');
Route::put('intro-update-purchase-status',[InTransitOrdersController::class,'updatePurchaseStatusInTrO'])->name('update.purchase.status.intro');


// In Stock Orders Routes...............................................
Route::get('/in-stock-orders',[InStockOrderController::class,'inStockOrders'])->name('in.stock.orders');
Route::get('edit-in-stock-orders/{id}',[InStockOrderController::class,'editStockOrder'])->name('edit.in.stock.order');
Route::put('update-instock-order',[InStockOrderController::class,'updateInStockOrder'])->name('update.in.stock.orders');
Route::get('view-in-stock-order-details/{id}',[InStockOrderController::class,'viewSingleInStockOrder'])->name('single.in.stock.order');
Route::get('instock-order-details-edit/{id}',[InStockOrderController::class,'editInStockOrderDetails'])->name('deatail.edit');
Route::put('update-instock-order-details',[InStockOrderController::class,'updateInStockOrderDetails'])->name('update.instock.order.deatail');

Route::get('returned-in-stock-order-edit/{id}',[InStockOrderController::class,'editInStockOrderReturn'])->name('edit.in.stock.order.returned');
Route::put('update-InStock-order-returned',[InStockOrderController::class,'updateInStockOrderReturned'])->name('update.in.stock.order.returned');
Route::get('ups-edit/{id}',[InStockOrderController::class,'editPurchaseStatusIso'])->name('edit.purchase.status.iso');
Route::put('iso-update-purchase-status',[InStockOrderController::class,'updatePurchaseStatusIso'])->name('update.purchase.status.iso');

// Manage Order Routes...............................................
Route::get('/manage-orders',[ManageOrderController::class,'ManageOrders'])->name('manage.orders');
Route::get('step1-submit-order',[ManageOrderController::class,'submitOrderIdStep1'])->name('submit.order.id.1');
Route::get('submit-order-id-step2',[ManageOrderController::class,'submitOrderIdStep2'])->name('submit.order.id.2');
Route::get('edit-selected-order/{id}',[ManageOrderController::class,'editSelectedOrder'])->name('edit.selected.order');
Route::put('update-selected-order',[ManageOrderController::class,'updateSelectedOrder'])->name('update.selected.order');
Route::get('view-single-selected-order/{id}',[ManageOrderController::class,'viewSingleSelectedOrder'])->name('view.single.selected.order');

Route::get('so-details-edit/{id}',[ManageOrderController::class,'editSelectedOrderDetails'])->name('edit.selected.order.details');

Route::put('update-selected-order-details',[ManageOrderController::class,'updateSelectedOrderDetails'])->name('update.selected.order.details');
Route::get('edit-returned-selected-order/{id}',[ManageOrderController::class,'editSelectedOrderReturned'])->name('edit.selected.order.returned');
Route::put('update-selected-returned-order',[ManageOrderController::class,'updateSelectedReturnedOrder'])->name('update.selected.returned.order');

Route::get('sops-edit/{id}',[ManageOrderController::class,'editSelectedOrderPurchaseStatus'])->name('edit.selected.order.purchase.status');
Route::put('update-purchase-status-manage-order',[ManageOrderController::class,'updateSelectedOrderPurchaseStatus'])->name('update.selected.order.purchase.status');
Route::get('purchased-selected-order/{id}/{po_status}',[ManageOrderController::class,'updateSelectedOrderPurchased'])->name('update.selected.order.purchased');

// In House Orders Routes.............................................................................................................................
Route::get('/in-house-orders',[InHouseOrdersController::class,'inHouseOrders'])->name('in.house.orders');
Route::get('edit-in-house-order/{id}',[InHouseOrdersController::class,'editInHouseOrder'])->name('edit.in.house.order');
Route::put('update-in-house-order',[InHouseOrdersController::class,'updateInHouseOrder'])->name('update.in.house.order');
Route::get('view-single-in-house-order/{id}',[InHouseOrdersController::class,'viewSingleInHouseOrder'])->name('view.single.in.house.order');

Route::get('details-in-house-order-edit/{id}',[InHouseOrdersController::class,'editInHouseOrderDetails'])->name('edit.in.house.order.details');

Route::get('returned-in-house-order-edit/{id}',[InHouseOrdersController::class,'editInHouseOrderReturned'])->name('edit.in.house.order.returned');
Route::put('update-in-house-order-returned',[InHouseOrdersController::class,'updateInHouseOrderReturned'])->name('update.in.house.order.returned');
Route::get('iho_purchase_status_edit/{id}',[InHouseOrdersController::class,'editPurchaseStatusIHO'])->name('edit.purchase.status.iho');
Route::PUT('inho-update-purchase-status',[InHouseOrdersController::class,'updatePurchaseStatusIHO'])->name('update.purchase.status.iho');

// .............................................................................................................................
//Returning Orders Routes.....................................................................
Route::get('/returning-orders',[ReturningOrdersController::class,'returningOrders'])->name('returning.orders');
Route::get('edit-returning-orders/{id}',[ReturningOrdersController::class,'editReturningOrders'])->name('edit.returning.orders');
Route::put('update-returning-order',[ReturningOrdersController::class,'updateReturningOrder'])->name('update.returning.order');
Route::get('view-single-returning-order/{id}',[ReturningOrdersController::class,'viewSingleReturningOrder'])->name('view.single.returning.orders');
Route::get('returningorder-deatails-edit/{id}',[ReturningOrdersController::class,'editReturningOrderDetails'])->name('edit.returning.order.details');
Route::put('update-returning-order-details',[ReturningOrdersController::class,'updateReturningOrderDetails'])->name('update.returning.order.details');
Route::get('edit-returningreturned-order/{id}',[ReturningOrdersController::class,'editReturningOrderReturned'])->name('edit.returning.order.returned');
Route::put('update-returning-order-returned',[ReturningOrdersController::class,'updateReturningOrderReturned'])->name('update.returning.order.returned');


//No Status Orders Routes.....................................................................
Route::get('no-status-orders',[NoStatusOrdersController::class,'noStatusOrders'])->name('no.status.orders');
Route::get('edit-no-status-orders/{id}',[NoStatusOrdersController::class,'editNoStatusOrders'])->name('edit.no.status.orders');
Route::put('update-no-status-order',[NoStatusOrdersController::class,'updateNoStatusOrder'])->name('update.no.status.order');
Route::get('view-single-no-status-order/{id}',[NoStatusOrdersController::class,'viewSingleNoStatusOrder'])->name('view.single.no.status.order');
Route::get('noStatus-order-deatails-edit/{id}',[NoStatusOrdersController::class,'editNoStatusOrderdeatails'])->name('edit.no.status.order.deatails');
Route::put('update-no-status-order-details',[NoStatusOrdersController::class,'updateNoStatusOrderDetails'])->name('update.no.status.order.details');
Route::get('edit-returned-no-status-order/{id}',[NoStatusOrdersController::class,'editNoStatusReturnedOrder'])->name('edit.no.status.order.returned');
Route::put('update-returned-no-status-order',[NoStatusOrdersController::class,'updateNoStatusOrderReturned'])->name('update.no.status.order.returned');

//Manage Couriers Routes.....................................................................
Route::get('/manage-courier',[App\Http\Controllers\ManageCourierController::class,'manageCouriers'])->name('manage.couriers');
Route::post('add-new-courier',[ManageCourierController::class,'addNewCouriers'])->name('add.new.courier');
Route::get('delete-courier/{id}',[ManageCourierController::class,'deleteCourier'])->name('delete.courier');

//CourierWiseOrdersTab's Routes.....................................................................

Route::get('/sundarban',[SundarbanController::class,'SundarbanCourierOrders'])->name('sundarban.courier.orders');
Route::get('edit_sundarban_order/{id}',[SundarbanController::class,'editSundarbanCourierOrder'])->name('edit.sundarban.courier.order');
Route::put('update-sundarban-order',[SundarbanController::class,'updateSundarbanCourierOrder'])->name('update.sundarban.courier.order');
Route::get('view-single-sundarban-order/{id}',[SundarbanController::class,'viewSingleSundarbanCourierOrder'])->name('view.single.sundarban.order');
Route::get('details-sundarbanOrder-edit/{id}',[SundarbanController::class,'editSundarbanCourierOrderDetails'])->name('edit.sundarban.courier.order.details');
Route::put('update-sundarban-order-details',[SundarbanController::class,'updateSundarbanOrderDetails'])->name('update.sundarban.order.details');
Route::get('sundarban-returned-order-edit/{id}',[SundarbanController::class,'editSundarbanOrderReturned'])->name('edit.sundarban.order.returned');
Route::put('update-sundarban-order-returned',[SundarbanController::class,'updateSundarbanOrderReturned'])->name('update.sundarban.order.returned');

Route::get('/janani',[JananiController::class,'JananiCourierOrders'])->name('janani.courier.orders');
Route::get('janani-order-edit/{id}',[JananiController::class,'editJananiCourierOrder'])->name('edit.janani.courier.order');
Route::put('update-janani-order',[JananiController::class,'updateJananiCourierOrder'])->name('update.janani.courier.order');
Route::get('view-single-janani-order/{id}',[JananiController::class,'viewSingleJananiCourierOrder'])->name('view.single.janani.order');
Route::get('jananiOrder-deatails-edit/{id}',[JananiController::class,'editJananiOrderDeatails'])->name('edit.janani.courier.order.deatails');
Route::put('update-janani-order-details',[JananiController::class,'updateJananiOrderDetails'])->name('update.janani.order.details');
Route::get('janani-returned-order-edit/{id}',[JananiController::class,'editJananiOrderReturned'])->name('edit.janani.order.returned');
Route::put('update-janani-order-returned',[JananiController::class,'updateJananiOrderReturned'])->name('update.janani.order.returned');

Route::get('/sa-paribahan',[SAparibahanController::class,'SAparibahanOrders'])->name('sa.paribahan.courier.orders');
Route::get('edit-sa-paribahan-order/{id}',[SAparibahanController::class,'editSAparibahanOrder'])->name('edit.sa.paribahan.order');
Route::put('update-sa-paribahan-order',[SAparibahanController::class,'updateSAparibahanOrder'])->name('update.sa.paribahan.order');
Route::get('view-single-sa-paribahan-order/{id}',[SAparibahanController::class,'viewSingleSAparibahanOrder'])->name('view.single.sa.paribahan.order');
Route::get('edit-sa-paribahan-order-details/{id}',[SAparibahanController::class,'editSAparibahanOrderDetails'])->name('edit.sa.paribahan.order.details');
Route::put('update-sa-paribahan-order-details',[SAparibahanController::class,'updateSAparibahanOrderDetails'])->name('update.sa.paribahan.order.details');
Route::get('sa-paribahan-returned-order-edit/{id}',[SAparibahanController::class,'editSAparibahanOrderReturned'])->name('edit.sa.paribahan.order.returned');
Route::put('update-sa-paribahan-order-returned',[SAparibahanController::class,'updateSAparibahanReturnedOrder'])->name('update.sa.paribahan.returned.order');

// Marketing....................................................................................................
Route::get('/offers',[MarketingController::class,'Offers'])->name('offers');

// Stock-Alert ..................................................
Route::get('/stock-alert',[StockController::class,'stockAlert'])->name('stock.alert');
Route::get('edit-product-stock/{id}',[StockController::class,'editStock'])->name('edit.stock');
Route::put('update-product-stock',[StockController::class,'updateStock'])->name('update.stock');
Route::get('count_low_product_stock',[StockController::class,'countLowStockProduct'])->name('count.low.stock.product');
// Current Stock..........................................................................................................
Route::get('current-stock',[StockController::class,'currentStock'])->name('current.stock');


// Customer-Data..................................................................................................................
Route::get('/customer-data',[CustomerController::class,'viewCustomersData'])->name('customer.data');

// Delivery Man.....................................................................................................
Route::get('delivery-man',[DeliveryManController::class,'deliveryManList'])->name('delivery.man.list');
Route::post('add-delivery-man-details',[DeliveryManController::class,'addDeliveryMan'])->name('add.delivery.man');
Route::get('delivery-man-edit/{id}',[DeliveryManController::class,'editDeliveryMan'])->name('edit.delivery.man');
Route::put('update-delivery-man-details',[App\Http\Controllers\DeliveryManController::class,'updateDeliveryManInfo'])->name('update.delivery.man');
Route::get('delete-delivery-man/{id}',[DeliveryManController::class,'deleteDeliveryMan'])->name('delete.delivery.man');

// Delivery Reports.....................................................................................................

Route::get('/delivery-reports',[DeliveryReportController::class,'deliveryReports'])->name('delivery.reports');
Route::get('/search-data-by-date',[DeliveryReportController::class,'submitDate'])->name('submit.date');
Route::get('/search-step-two',[DeliveryReportController::class,'submitSecondTime'])->name('submit.date.second');



// End of Middleware................................................................................................................
});




