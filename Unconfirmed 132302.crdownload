function showContent(contentId) {
    var contents = document.getElementsByClassName('content');
    for (var i = 0; i < contents.length; i++) {
        contents[i].classList.remove('active');
        contents[i].style.display = 'none';
    }

    var selectedContent = document.getElementById(contentId);
    selectedContent.style.display = 'block';
    setTimeout(function() {
        selectedContent.classList.add('active');
    }, 10);
}

window.onload = function() {
    showContent('content1');
};