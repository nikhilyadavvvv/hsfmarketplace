<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';

// Costumers class
require_once BASE_PATH . '/lib/Products/Products.php';
$products = new Products();

// Get Input data from query string
$order_by	= filter_input(INPUT_GET, 'order_by');
$order_dir	= filter_input(INPUT_GET, 'order_dir');
$search_str	= filter_input(INPUT_GET, 'search_str');

// Per page limit for pagination
$pagelimit = 15;

// Get current page
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
	$page = 1;
}

// If filter types are not selected we show latest added data first
if (!$order_by) {
	$order_by = 'id';
}
if (!$order_dir) {
	$order_dir = 'Desc';
}

// Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('id', 'name', 'category', 'cost', 'status');

// Start building query according to input parameters
// If search string
if ($search_str) {
	$db->where('name', '%' . $search_str . '%', 'like');
	$db->orwhere('category', '%' . $search_str . '%', 'like');
}
// If order direction option selected
if ($order_dir) {
	$db->orderBy($order_by, $order_dir);
}

// Set pagination limit
$db->pageLimit = $pagelimit;

// Get result of the query
$rows = $db->arraybuilder()->paginate('table_product', $page, $select);
$total_pages = $db->totalPages;
?>
<?php include BASE_PATH . '/includes/header.php'; ?>
<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Products</h1>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php'; ?>

    <!-- Filters -->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Search</label>
            <input type="text" class="form-control" id="input_search" name="search_str" value="<?php echo htmlspecialchars($search_str, ENT_QUOTES, 'UTF-8'); ?>">
            <label for="input_order">Order By</label>
            <select name="order_by" class="form-control">
                <?php
                foreach ($products->setOrderingValues() as $opt_value => $opt_name):
                   ($order_by === $opt_value) ? $selected = 'selected' : $selected = '';
                   echo ' <option value="' . $opt_value . '" ' . $selected . '>' . $opt_name . '</option>';
               endforeach;
               ?>
           </select>
           <select name="order_dir" class="form-control" id="input_order">
            <option value="Asc" <?php
            if ($order_dir == 'Asc') {
               echo 'selected';
           }
           ?> >Asc</option>
           <option value="Desc" <?php
           if ($order_dir == 'Desc') {
               echo 'selected';
           }
           ?>>Desc</option>
       </select>
       <input type="submit" value="Go" class="btn btn-primary">
   </form>
</div>
<hr>
<!-- //Filters -->

<!-- Table -->
<table class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%" class="text-center">SL</th>
            <th width="20%" class="text-center">Name</th>
            <th width="15%" class="text-center">Category</th>
            <th width="15%" class="text-center">Cost</th>
            <th width="15%" class="text-center">Status</th>
            <th width="10%" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i=1;
        foreach ($rows as $row): ?>
            <tr>
                <td class="text-center"><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($row['category']); ?></td>
                <td class="text-center">&euro;<?php echo htmlspecialchars($row['cost']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($row['status']); ?></td>
                <td class="text-center">
                    <a href="#" class="btn btn-success accept_btn" data-toggle="modal" data-target="#confirm-accept-<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-ok-sign"></i></a>

                    <a href="#" class="btn btn-danger reject_btn" data-toggle="modal" data-target="#confirm-reject-<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>

                </td>
            </tr>
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="confirm-reject-<?php echo $row['id']; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="reject_products.php" method="POST">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="rej_id" id="rej_id" value="<?php echo $row['id']; ?>">
                                <p>Are you sure you want to reject this row?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default pull-left">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- //Delete Confirmation Modal -->


            <div class="modal fade" id="confirm-accept-<?php echo $row['id']; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="accept_products.php" method="POST">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="rej_id" id="rej_id" value="<?php echo $row['id']; ?>">
                                <p>Are you sure you want to accept this row?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default pull-left">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        <?php endforeach; ?>
    </tbody>
</table>
<!-- //Table -->

<!-- Pagination -->
<div class="text-center">
   <?php echo paginationLinks($page, $total_pages, 'products.php'); ?>
</div>
<!-- //Pagination -->
</div>
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php'; ?>
