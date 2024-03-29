<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';

// Costumers class
require_once BASE_PATH . '/lib/Costumers/Costumers.php';
$costumers = new Costumers();

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
	$order_by = 'user_id';
}
if (!$order_dir) {
	$order_dir = 'Desc';
}

// Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('user_id', 'firstname', 'lastname', 'email', 'phone', 'is_buyer', 'is_seller', 'status', 'rewards');

// Start building query according to input parameters
// If search string
if ($search_str) {
	$db->where('firstname', '%' . $search_str . '%', 'like');
	$db->orwhere('lastname', '%' . $search_str . '%', 'like');
}
// If order direction option selected
if ($order_dir) {
	$db->orderBy($order_by, $order_dir);
}

// Set pagination limit
$db->pageLimit = $pagelimit;

// Get result of the query
$rows = $db->arraybuilder()->paginate('user', $page, $select);
$total_pages = $db->totalPages;
?>
<?php include BASE_PATH . '/includes/header.php'; ?>
<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Customers</h1>
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
                foreach ($costumers->setOrderingValues() as $opt_value => $opt_name):
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
            <th width="10%" class="text-center">Firstname</th>
            <th width="10%" class="text-center">Lastname</th>
            <th width="20%" class="text-center">Email</th>
            <th width="20%" class="text-center">Phone</th>
            <th width="10%" class="text-center">Type</th>
            <th width="10%" class="text-center">Rewards</th>
            <th width="15%" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i=1;
        foreach ($rows as $row): ?>
            <tr>
                <td class="text-center"><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($row['email']); ?></td>
                <td class="text-center"><?php echo htmlspecialchars($row['phone']); ?></td>
                <td class="text-center"><?php if ($row['is_buyer'] == 'y') {
                    echo "Buyer";
                }else{
                    echo "Seller";
                } ?></td>
                <td class="text-center">
                    <a href="#" class="btn btn-info rewards_btn" data-toggle="modal" data-target="#confirm-rewards-<?php echo $row['user_id']; ?>"><?php echo $row['rewards']; ?></a>
                </td>

                <td class="text-center">
                    <a href="#" class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['user_id']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                </td>


            </tr>
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="confirm-delete-<?php echo $row['user_id']; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="delete_customer.php" method="POST">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="del_id" id="del_id" value="<?php echo $row['user_id']; ?>">
                                <p>Are you sure you want to delete this row?</p>
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

            <!-- rewards Confirmation Modal -->
            <div class="modal fade" id="confirm-rewards-<?php echo $row['user_id']; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="rewards_customer.php" method="POST">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to reward this user?</p>
                                <div class="form-group">
                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $row['user_id']; ?>">
                                    <input type="number" name="rewards" id="rewards" value="<?php echo $row['rewards']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default pull-left">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- //rewards Confirmation Modal -->

        <?php endforeach; ?>
    </tbody>
</table>
<!-- //Table -->

<!-- Pagination -->
<div class="text-center">
   <?php echo paginationLinks($page, $total_pages, 'customers.php'); ?>
</div>
<!-- //Pagination -->
</div>
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php'; ?>
