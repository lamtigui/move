const topBtn = document.getElementById("topBtn");

      window.onscroll = function () {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
          topBtn.style.display = "block";
        } else {
          topBtn.style.display = "none";
        }
      };

      function scrollToTop() {
        window.scrollTo({ top: 0, behavior: "smooth" });
      }