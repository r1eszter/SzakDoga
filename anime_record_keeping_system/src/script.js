const card = document.querySelector(".card"),
firstImg = card.querySelectorAll("img")[0],
arrowIcons = document.querySelectorAll(".wrapper i");

let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft, positionDiff;

const showHideIcons = () => {
    // showing and hiding prev/next icon according to card scroll left value
    let scrollWidth = card.scrollWidth - card.clientWidth; // getting max scrollable width
    arrowIcons[0].style.display = card.scrollLeft == 0 ? "none" : "block";
    arrowIcons[1].style.display = card.scrollLeft == scrollWidth ? "none" : "block";
}

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        let firstImgWidth = firstImg.clientWidth + 14; // getting first img width & adding 14 margin value
        // if clicked icon is left, reduce width value from the card scroll left else add to it
        card.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
    });
});

const autoSlide = () => {
    // if there is no image left to scroll then return from here
    if(card.scrollLeft - (card.scrollWidth - card.clientWidth) > -1 || card.scrollLeft <= 0) return;

    positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
    let firstImgWidth = firstImg.clientWidth + 14;
    // getting difference value that needs to add or reduce from card left to take middle img center
    let valDifference = firstImgWidth - positionDiff;

    if(card.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
        return card.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
    }
    // if user is scrolling to the left
    card.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
}

const dragStart = (e) => {
    // updatating global variables value on mouse down event
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = card.scrollLeft;
}

const dragging = (e) => {
    // scrolling images/card to left according to mouse pointer
    if(!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    card.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    card.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
}

const dragStop = () => {
    isDragStart = false;
    card.classList.remove("dragging");

    if(!isDragging) return;
    isDragging = false;
    autoSlide();
}

card.addEventListener("mousedown", dragStart);
card.addEventListener("touchstart", dragStart);

document.addEventListener("mousemove", dragging);
card.addEventListener("touchmove", dragging);

document.addEventListener("mouseup", dragStop);
card.addEventListener("touchend", dragStop);