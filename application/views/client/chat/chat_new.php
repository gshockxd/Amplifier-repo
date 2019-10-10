<div class="container py-3">
    <div class="row"> 
        <div class="col-md-4"> <!-- {{-- START OF LVL 1--}} -->
            <p class="font-weight-bold text-center red-brown h5">Messages <span><a href="chat_new" class="red-brown ml-5"><i class="fas fa-pen fa-lg"></i></a></span></p>
            
            <hr>

            <?php $this->load->view('client/chat/chat_left'); ?>

        </div>  <!-- {{-- END OF lvl 1--}} -->

        <?php $this->load->view('client/chat/chat_search'); ?>

        <!-- <?php// $this->load->view('client/chat/chat_right'); ?> -->

    </div>
</div>

<script type='text/javascript'>
	var tmp = <?php echo json_encode($users) ?>;
	// console.log(tmp);
	var users = [];
	for (var i = 0; i < tmp.length; i++) {
		// alert(tmp[i].id);
		item = {};
		item["value"] = tmp[i].user_id;
		item['label'] = tmp[i].lname+", "+tmp[i].fname;
		// if (tmp[i].username == null) {
		// 	item["label"] = tmp[i].lname+", "+tmp[i].fname;
		// } else {
		// 	item["label"] = tmp[i].lname+", "+tmp[i].fname+" "+tmp[i].mname;
		// }
        users.push(item);
    }
    
        console.log(tmp);
</script>	