let countforums = () => {
    let forumCounter = document.querySelectorAll('.bbp-forum-status-open').length;
    let numberOf = 0
    setInterval(() => {
        if (numberOf != forumCounter)
            numberOf++;
        document.getElementById('countForums').innerHTML = `${numberOf}`;
    }, 150);
}

/**
 * 
 * @param {String} parent 
 * @param {String} child 
 */
let countTopix = (parent, child) => {
    const topixCounter = document.querySelectorAll(parent)
    let arrayOfelement = []
    let sum = 0
    topixCounter.forEach(element => {
        const topixStringToNumber = parseInt(element.textContent);
        arrayOfelement.push(topixStringToNumber);
    });
    for (let i = 0; i < arrayOfelement.length; i++) {
        sum += arrayOfelement[i];
    }
    let numberOf = 0
    setInterval(() => {
        if (numberOf != sum)
            numberOf++;
        document.querySelector(child).innerHTML = numberOf;
    }, 150);
};

let createAttribute = (item, attr, fun) => {
    document.querySelectorAll(item).forEach(element => {
        element.setAttribute(attr, fun)
    });
};  