 <!-- Sidebar Area Start -->
 <div class="col-2 bg-white shadow-sm vh-100">
   <!-- Logo Area Start -->
   <div class="py-3 text-center">
     <img src="<?php echo stored_file("logo/" . get_logo()); ?>" alt="logo" width="80px" />
   </div>
   <!-- Logo Area End -->
   <!-- Sidebar Link Area Start -->
   <div class="row">
     <div class="col mt-5">
       <ul class="list-group list-group-flush">
         <li class="list-group-item">
           <a href="<?php echo url("/admin/dashboard"); ?>" class="text-decoration-none fs-6 text-dark fw-bold text-capitalize d-block">
             <i class="bi bi-diagram-3 fs-5 me-1"></i>
             Dashboard
           </a>
         </li>
         <li class="list-group-item">
           <a href="<?php echo url("/admin/orders"); ?>" class="text-decoration-none fs-6 text-dark fw-bold text-capitalize d-block">
             <i class="bi bi-cart fs-5 me-1"></i>
             Orders
           </a>
         </li>
         <li class="list-group-item">
           <a href="<?php echo url("/admin/books"); ?>" class="text-decoration-none fs-6 text-dark fw-bold text-capitalize d-block">
             <i class="bi bi-book fs-5 me-1"></i>
             Books
           </a>
         </li>
         <li class="list-group-item">
           <a href="<?php echo url("/admin/messages"); ?>" class="text-decoration-none fs-6 text-dark fw-bold text-capitalize d-block">
             <i class="bi bi-envelope-open fs-5 me-1"></i>
             Messages
           </a>
         </li>
         <li class="list-group-item">
           <a href="<?php echo url("/admin/banners"); ?>" class="text-decoration-none fs-6 text-dark fw-bold text-capitalize d-block">
             <i class="bi bi-bricks fs-5 me-1"></i>
             Banners
           </a>
         </li>
         <li class="list-group-item">
           <a href="<?php echo url("/admin/settings"); ?>" class="text-decoration-none fs-6 text-dark fw-bold text-capitalize d-block">
             <i class="bi bi-gear fs-5 me-1"></i>
             Settings
           </a>
         </li>
         <li class="list-group-item">
           <a href="<?php echo url("/admin/privacy/policy"); ?>" class="text-decoration-none fs-6 text-dark fw-bold text-capitalize d-block">
             <i class="bi bi-shield-check"></i>
             Privacy Policy
           </a>
         </li>
         <li class="list-group-item">
           <a href="<?php echo url("/admin/terms/conditions"); ?>" class="text-decoration-none fs-6 text-dark fw-bold text-capitalize d-block">
             <i class="bi bi-pin"></i>
             Terms & Conditions
           </a>
         </li>
       </ul>
     </div>
   </div>
   <!-- Sidebar Link Area End -->
 </div>
 <!-- Sidebar Area End -->