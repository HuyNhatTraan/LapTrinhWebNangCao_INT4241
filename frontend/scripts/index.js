fetch('/LapTrinhWebNangCao_INT4241/frontend/components/nav.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('nav').innerHTML = data;      
    }
);

fetch('/LapTrinhWebNangCao_INT4241/frontend/components/footer.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('footer').innerHTML = data;       
    }
);