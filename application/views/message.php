<?php if ($this->session->has_userdata('success')) { ?>
<script type="text/javascript">
  function success() {
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Good job!',
      html: '<?=$this->session->flashdata('success');?>',
      showConfirmButton: false,
      width: '25rem',
      timer: 3000
    })
  };
</script>
<p></p>
<?php } ?>
<?php if ($this->session->has_userdata('error')) { ?>
<script type="text/javascript">
  function error() {
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'Oops...',
      html: '<?=$this->session->flashdata('error');?>',
      showConfirmButton: false,
      width: '25rem',
      timer: 3000
    })
  };
</script>
<p></p>
<?php } ?>
