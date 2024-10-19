<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/admin/nav.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/admin/categories.css" />
    
    <!-- Modal CSS -->
    <style>
        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            padding-top: 100px; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 400px;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <script>
        function showConfirmationModal(eventCategoryId) {
            // Show the modal
            document.getElementById("confirmationModal").style.display = "block";
            // Store the event category ID to delete
            document.getElementById("eventCategoryIdToDelete").value = eventCategoryId;
        }

        function closeConfirmationModal() {
            // Hide the modal
            document.getElementById("confirmationModal").style.display = "none";
        }

        function proceedDelete() {
            var eventCategoryId = document.getElementById("eventCategoryIdToDelete").value;
            // Redirect to the delete URL
            window.location.href = "<?php echo URLROOT;?>/admin/deleteEventCategory/" + eventCategoryId;
        }
    </script>
</head>
<body>
    <?php require APPROOT . '/views/admin/nav.php';?>
    <div class="table-container">
        <div class="container-column" style="margin-bottom: 50px;">
            <div class="above-table">
                <h3>Book Categories</h3>
                <a href="<?php echo URLROOT;?>/admin/addBookCategories" class="btn"><button>Book Category</button></a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['bookCategoryDetails'] as $bookCategoryDetails): ?>
                    <tr>
                        <td class="tdata"><?php echo $bookCategoryDetails->id; ?></td>
                        <td><?php echo $bookCategoryDetails->category; ?></td>
                        <td class="description"><?php echo $bookCategoryDetails->description; ?></td>
                        <td>
                            <a href="<?php echo URLROOT;?>/admin/updateBookCategory/<?php echo $bookCategoryDetails->id;?>">
                                <i class="fa fa-solid fa-pen"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="showConfirmationModal(<?php echo $bookCategoryDetails->id; ?>)">
                                <i class="fa fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
  
        <div class="container-column">
            <div class="above-table">
                <h3>Event Categories</h3>
                <a href="<?php echo URLROOT;?>/admin/addEventCategory" class="btn"><button>Event Category</button></a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Event</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php foreach($data['eventCategoryDetails'] as $eventCategoryDetails): ?>
                    <tr>
                        <td class="tdata"><?php echo $eventCategoryDetails->id; ?></td>
                        <td><?php echo $eventCategoryDetails->event; ?></td>
                        <td><?php echo $eventCategoryDetails->description; ?></td>
                        <td>
                            <a href="<?php echo URLROOT;?>/admin/updateEventCategory/<?php echo $eventCategoryDetails->id;?>">
                                <i class="fa fa-solid fa-pen"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="showConfirmationModal(<?php echo $eventCategoryDetails->id; ?>)">
                                <i class="fa fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    </div>

    <!-- Confirmation Modal for Event Category -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeConfirmationModal()">&times;</span>
            <h2>Confirmation</h2>
            <p>Are you sure you want to delete this event category?</p>
            <input type="hidden" id="eventCategoryIdToDelete">
            <button onclick="proceedDelete()">Yes</button>
            <button onclick="closeConfirmationModal()">No</button>
        </div>
    </div>
  
</body>
</html>
