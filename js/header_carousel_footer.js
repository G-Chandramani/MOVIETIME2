  fetch('../assets/carousel.php')
      .then(response => response.text())
      .then(html => {
        document.getElementById('extr_carousel').innerHTML = html;
      });

        fetch('../assets/header.php')
          .then(response => response.text())
          .then(html => {
            document.getElementById('header').innerHTML = html;
          });

        fetch('../assets/footer.php')
          .then(response => response.text())
          .then(html => {
            document.getElementById('footer').innerHTML = html;
          });