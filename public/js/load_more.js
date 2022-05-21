const btnLoadMore = document.querySelector('.btn-load-more');

btnLoadMore.addEventListener('click', function (e) {
    const cards = document.querySelector('.cards')
    let offset = parseInt(e.target.getAttribute("last-screenshot-id"))
    const url = `../php_scripts/load_more.php?offset=${offset}`
    fetch(url)
        .then(response => response.text())
        .then(result => {
            cards.insertAdjacentHTML('beforeend', result)
            btnLoadMore.setAttribute("last-screenshot-id", (offset - 9).toString())
            if (offset < 0) {
                btnLoadMore.style.display = 'none';
            }
        }).catch(error => console.log(error))

})




