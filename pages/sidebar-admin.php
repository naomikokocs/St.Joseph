<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
            <a href="../dashboard/dashboard.php" class="nav-link">
                <i class="nav-icon fa  fa-cube"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="../document-category/document-category.php" class="nav-link">
                <i class="nav-icon fa ion-android-document"></i>
                <p>
                    Document Category
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="../document/document.php" class="nav-link">
                <i class="nav-icon fa ion-android-folder"></i>
                <p>
                   Documents
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fa  ion-ios-paper"></i>
                <p>
                    Document Requests
                </p>
                <?php echo $new_document_request_badge; ?>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                        <a href="../document-request/new-document-request.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>New Request</p>
                            <?php echo $new_document_request_badge; ?>
                        </a>
                </li>
                <li class="nav-item">
                        <a href="../document-request/approved-document-request.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Approved Request</p>
                        </a>
                </li>
                <li class="nav-item">
                        <a href="../document-request/rejected-document-request.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Rejected Request</p>
                        </a>
                </li>
            </ul>
        </li>
                
        <li class="nav-item">
            <a href="../member/member.php" class="nav-link">
                <i class="nav-icon fa  fa-users"></i>
                <p>
                    Members
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="../donation/donation.php" class="nav-link">
                <i class="nav-icon fa  ion-filing"></i>
                <p>
                    Donations
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="../priest-schedule/priest-schedule.php" class="nav-link">
                <i class="nav-icon fa  fa-user"></i>
                <p>
                    Priest Schedule
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="../user/user.php" class="nav-link">
                <i class="nav-icon fa  ion-android-person"></i>
                <p>
                    Users
                </p>
            </a>
        </li>
                
        <li class="nav-item">
            <a href="../about/about.php" class="nav-link">
                <i class="nav-icon fa  fa-info"></i>
                <p>
                    About
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="../activity-log/activity-log.php" class="nav-link">
                <i class="nav-icon fa  ion-android-list"></i>
                <p>
                    Activity Log
                </p>
            </a>
        </li>
        
    </ul>
</nav>