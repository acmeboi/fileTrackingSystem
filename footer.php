<footer class="main-footer">
    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">GETCERTIFIED LTD</a>. All Rights Reserved.
</footer>
<!-- Side panel --> 

<!-- quick_user_toggle -->
<div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content slim-scroll3">
            <div class="modal-body p-30 bg-white">
                <div class="d-flex align-items-center justify-content-between pb-30">
                    <h4 class="m-0">User Profile
                        <a href="#" class="btn btn-icon btn-danger-light btn-sm no-shadow" data-bs-dismiss="modal">
                            <span class="fa fa-close"></span>
                        </a>
                </div>
                <div>
                    <div class="d-flex flex-row">
                        <div class=""><img src="images/avatar/avatar-13.png" alt="user" class="rounded bg-danger-light w-150" width="100"></div>
                        <div class="ps-20">
                            <h5 class="mb-0"><?php echo $staffName; ?></h5>
                            <a href=""><?php ?></a>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider my-30"></div>
                <div>
                    <div class="d-flex align-items-center mb-30">
                        <div class="me-15 bg-primary-light h-50 w-50 l-h-60 rounded text-center">
                            <span class="icon-Library fs-24"><span class="path1"></span><span class="path2"></span></span>
                        </div>
                        <div class="d-flex flex-column fw-500">
                            <a href="#" onclick="return false;" class="text-dark hover-primary mb-1 fs-16">My Profile</a>
                            <span class="text-fade">Account settings and more</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-30">
                        <div class="me-15 bg-success-light h-50 w-50 l-h-60 rounded text-center">
                            <span class="icon-Group-chat fs-24"><span class="path1"></span><span class="path2"></span></span>
                        </div>
                        <div class="d-flex flex-column fw-500">
                            <a href="setting.php" class="text-dark hover-success mb-1 fs-16">Settings</a>
                            <span class="text-fade">Accout Settings</span>
                        </div>
                    </div>

                    <div class="dropdown-divider my-30"></div>

                    <div class="d-flex align-items-center mb-30">
                        <div class="me-15 bg-success-light h-50 w-50 l-h-60 rounded text-center">
                            <span class="icon-Group-chat fs-24"><span class="path1"></span><span class="path2"></span></span>
                        </div>
                        <div class="d-flex flex-column fw-500">
                            <a href="logout.php" class="text-dark hover-success mb-1 fs-16">Logout</a>
                        </div>
                    </div>

                </div>
                <div class="dropdown-divider my-30"></div>
            </div>
        </div>
    </div>
</div>
<!-- /quick_user_toggle --> 


<!-- Vendor JS -->
<script src="src/js/vendors.min.js"></script>
<script src="src/js/pages/chat-popup.js"></script>
<script src="assets/icons/feather-icons/feather.min.js"></script>	

<script src="assets/vendor_components/datatable/datatables.min.js"></script>	
<script src="src/js/pages/data-table.js"></script>	

<!-- EmployX App -->
<script src="src/js/demo.js"></script>
<script src="src/js/template.js"></script>

<script>
    $(document).ready(function(){
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function(){

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            if(current !== 3) {
                  //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show(); 
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    }, 
                    duration: 500
                });
                setProgressBar(++current);
            }else {
                var allAreFilled = true;
                document.getElementById("msform").querySelectorAll("[required]").forEach(function(i){
                    if(!allAreFilled) return;
                    if(!i.value) {
                        allAreFilled = false;
                        return;
                    }
                });
                if(!allAreFilled){
                    alert("Please Fill all the required fields");
                    return;
                }
            }
            
        });

        $(".previous").click(function(){

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                }, 
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar").css("width",percent+"%");
            
        }

        $(".submit").click(function(){
            var allAreFilled = true;
            document.getElementById("msform").querySelectorAll("[required]").forEach(function(i){
                if(!allAreFilled) return;
                if(!i.value) {
                    allAreFilled = false;
                    return;
                }
            });
            if(!allAreFilled){
                alert("Please Fill all the required fields");
            }else {
                $('form').submit();
            }
        });
    });
</script>


</body>
</html>