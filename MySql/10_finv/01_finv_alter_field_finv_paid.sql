ALTER TABLE `finv_invoice`   
  CHANGE `finv_paid` `finv_paid` ENUM('is paid','not paid','partly paid') DEFAULT 'not paid'   NULL;
