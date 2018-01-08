<script>
<?php if(isset($_SESSION["msg_erro"])){ ?>
	swal('Oops...','<?= $_SESSION["msg_erro"];?>', 'error');<?php $_SESSION["msg_erro"] = null;?>
<?php } ?>

<?php if(isset($_SESSION["msg_ok"])){ ?>
	swal('Oops...','<?= $_SESSION["msg_ok"];?>', 'success');<?php $_SESSION["msg_ok"] = null;?>
<?php } ?>

<?php if(isset($_SESSION["msg_info"])){ ?>
	swal('Oops...','<?= $_SESSION["msg_info"];?>', 'info ');<?php $_SESSION["msg_info"] = null;?>
<?php } ?>
</script>