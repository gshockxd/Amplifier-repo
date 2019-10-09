<div class="container py-3">
    <div class="row"> 
        <div class="col-sm-4"> <!-- {{-- START OF LVL 1--}} -->
            <p class="font-weight-bold text-center red-brown h5">Messages <span><a href="chat_new" class="red-brown ml-5"><i class="fas fa-pen fa-lg"></i></a></span></p>
            
            <hr>

        <?php $this->load->view('client/chat/chat_left'); ?>

        </div>  <!-- {{-- END OF lvl 1--}} -->


        <?php $this->load->view('client/chat/chat_right'); ?>

    </div>
</div>