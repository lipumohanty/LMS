<ul class="nav">
    <li  class="dropdown" id="profile-messages" >
        <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle" style="color: white">
            <i class="icon icon-user"></i>  
            <span class="text">WELCOME,  <?php echo $_SESSION["email"]["fname"]?></span>
            <b class="caret"></b>
        </a>
    </li>
    <li class="">
        <a title="LOG OUT" href="index.php">
            <i class="icon icon-share-alt"></i> 
            <span class="text">LOGOUT</span>
        </a>
    </li>
</ul>