<div class="container text-center">
    <a class="cc-facebook btn btn-link" href="{{ isset($about->facebook) ? $about->facebook : '#' }}" target="_blank"><i
            class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
    <a class="cc-instagram btn btn-link" href="{{ isset($about->instagram) ? $about->instagram : '#' }}" target="_blank"><i
            class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
    <a class="cc-whatsapp btn btn-link" href="https://wa.me/62{{ isset($about->whatsapp) ? $about->whatsapp : '#' }}" target="_blank"><i class="fa fa-whatsapp fa-2x"
            aria-hidden="true"></i></a>
</div>
<div class="text-center text-muted">
    <p>
        2021 -
        <script>
            document.write(new Date().getFullYear())
        </script> &copy; Developed by -
        <a class="credit" href="#">Arjunstein</a>
    </p>
</div>
