<div class="container py-3">
    <div class="row"> 
        <div class="col-md-4"> <!-- {{-- START OF LVL 1--}} -->
            <p class="font-weight-bold text-center red-brown h5">Messages <span><a href="" class="red-brown ml-5"><i class="fas fa-pen fa-lg"></i></a></span></p>
            
            <hr>
            <!-- {{-- <div class="row">
                    {{-- lvl 1 
                <div class="col-sm">
                    {{-- lvl 1.1 
                    <h2 class="text-primary">Recent</h2>
                </div>  
                <div class="col-sm">
                    {{-- lvl 1.2 
                    <input type="text" placeholder="search">
                </div>
            </div> --}} -->
            <div class="inbox-chat">
                <div id="chat-1">
                    <a href="chat.php" class="btn btn-outline-chat">
                        <div class="row text-chat">
                           <!--  {{-- lvl 1.2 --}} -->
                            <div class="col-md-2">
                                <!-- {{-- lvl 1.2.1 --}} -->
                                <img src="<?php echo base_url(); ?>assets/img/pp.png " alt="" class="avatar-img rounded-circle">
                            </div>
                            <div class="col-md-10">
                               <!--  {{-- lvl 1.2.2 --}} -->
                                <div class="row">
                                    <div class="col-md-7 ">
                                        <p class="">Nike Marti Caballes</p>
                                    </div>
                                    <div class="col-md-5 ">
                                        <p class="h6 ">11:01 PM</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                       <!--  {{-- lvl 1.2.2.1 --}} -->
                                        <p class="">You: Test, which is a new appr..</p>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </a>
                </div>
                <div class="py-1"></div>

                <?php for($x=0; $x<10; $x++){ ?>
                    <div id="chat-1">
                        <a href="" class="btn btn-outline-chat">                            
                            <div class="row text-chat">
                               <!--  {{-- lvl 1.2 --}} -->
                                <div class="col-md-2">
                                    <!-- {{-- lvl 1.2.1 --}} -->
                                    <img src="<?php echo base_url(); ?>assets/img/pp.png " alt="" class="avatar-img rounded-circle">
                                </div>
                                <div class="col-md-10">
                                   <!--  {{-- lvl 1.2.2 --}} -->
                                    <div class="row">
                                        <div class="col-md-7 ">
                                            <p class=" ">Nike Marti Caballes</p>
                                        </div>
                                        <div class="col-md-5 ">
                                            <p class=" h6">11:01 PM</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                           <!--  {{-- lvl 1.2.2.1 --}} -->
                                            <p class="">You: Test, which is a new appr..</p>
                                        </div>
                                    </div>
                                </div>                    
                            </div>
                        </a>
                    </div>
                    <div class="py-1"></div>
                <?php } ?>

            </div>

        </div>  <!-- {{-- END OF lvl 1--}} -->

        <div class="col-md-8">
            <!-- <div class="col-md-12 row">
                    <label for=""></label>
                <input type="text" name="new_message" class="form-control">
            </div> -->
            <div class="form-group row">
                <label for="" class="col-md-1 col-form-label">To:</label>
                <div class="col-md-10">
                    <input type="text" id="user_id" name="user_id">
                    <input type="text" class="form-control" id="user_name" placeholder="Type a name of a person">
                </div>
                <div class="col-md-1 col-form-label"><a href="" class="red-brown"><i class="fas fa-search fa-lg"></i></a></div>
            </div>
        </div>
    </div>
</div>
<?php 
    // echo '<pre>';
    // print_r($users);
    // echo '</pre>';
?>

<script>
	var tmp =($users);
	var users = [];
	for (var i = 0; i < tmp.length; i++) {
		alert(tmp[i].id);
		item = {};
		item["value"] = tmp[i].id;
		item['label'] = tmp[i].lname+", "+tmp[i].fname+"  "+tmp[i].mname+".";
		// if (tmp[i].username == null) {
		// 	item["label"] = tmp[i].lname+", "+tmp[i].fname;
		// } else {
		// 	item["label"] = tmp[i].lname+", "+tmp[i].fname+" "+tmp[i].mname;
		// }

		users.push(item);
	}
	console.log(users);
</script>	