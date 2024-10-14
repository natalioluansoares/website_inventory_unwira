<?php if ($this->session->has_userdata('error')) { ?>
    <div class="alert alert-error alert-dismissible" style="background-color: rgb(243, 20, 20); color: black">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-ban"></i><?= strip_tags(str_replace('</p>', '',  $this->session->flashdata('error'))); ?>
    </div>
<?php } ?>