
function countforums() {
    let forumCounter = document.querySelectorAll('.bbp-forum-status-open').length;
document.getElementById('countForums').innerHTML = `${forumCounter}`;
}

