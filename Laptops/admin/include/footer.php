</main>
<footer>
    <div class="container">
        <p>&copy; <?php echo date("Y"); ?> Laptop Store. All Rights Reserved.</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
</footer>
<script>
let slides = document.querySelectorAll('.hero .slide');
let current = 0;
function showSlide(index){
  slides.forEach(s => s.classList.remove('active'));
  slides[index].classList.add('active');
}
setInterval(()=>{
  current = (current+1) % slides.length;
  showSlide(current);
},5000); // 5 seconds
</script>

</body>
</html>
