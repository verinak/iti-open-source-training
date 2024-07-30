// Part 1

let childWindow;
let moveInterval;
let position = 0;
let direction = 1;
const childSize = 300;
const screenHeight = window.screen.availHeight - 40;

function openWindow() {
    childWindow = window.open('./windows/child.html', 'childWindow', `width=${childSize},height=${childSize}`);
    childWindow.moveBy(100,0);
    moveWindow();
}

function closeWindow() {
    clearInterval(moveInterval);
    childWindow.close();
}

function moveWindow() {
    // calculate total distance that the window can move
    let distance = screenHeight - childSize;
    let step = 0;

    moveInterval = setInterval(() => {

        if (childWindow.closed) {
            clearInterval(moveInterval);
            return;
        }

        step = direction * 10;

        // console.log("step " + step);
        // console.log("distance " + distance);

        if ((distance < 10 && direction === 1) || (distance > screenHeight - childSize - 50 && direction === -1)) {
            direction *= -1; // Change direction
            step = direction * 10; // calculate new step
        }

        childWindow.moveBy(0, step);
        distance -= step;

    }, 100);
}

// Part 2

let typingWindow;
let typingInterval;
let par;
function typing(message) {

    typingWindow = window.open('./windows/typing.html', 'typingWindow', `width=${childSize},height=${childSize}`);

    typingWindow.onload = function() {
        par = typingWindow.document.getElementById('message');
    }

    let idx = 0;

    typingInterval = setInterval(() => {

        if (typingWindow.closed) {
            clearInterval(typingInterval);
            return;
        }

        if (idx === message.length) {
            setTimeout(() => {
                typingWindow.close();
            }, 3000);
            return;
        }

        par.textContent += message[idx++];


    }, 300);

}

// Part 3
let scrollingWindow;
let scrollInterval;

function scrolling() {
    // console.log('scroll function');
    scrollingWindow = window.open('./windows/scrolling.html', 'scrollingWindow', `width=${childSize},height=${childSize}`);

    scrollInterval = setInterval(() => {

        if (scrollingWindow.closed) {
            clearInterval(scrollInterval);
            return;
        }

        if (scrollingWindow.scrollY + scrollingWindow.innerHeight >= scrollingWindow.document.body.scrollHeight) {
            scrollingWindow.close();
            return;
        } 

        scrollingWindow.scrollBy(0, 50);

    }, 300);

}


