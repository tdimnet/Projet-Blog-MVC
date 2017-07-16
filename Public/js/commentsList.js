// Selecting the elements already here inside the DOM
const commentList = document.querySelector('.comment-list');
const commentsItem = document.querySelectorAll('.comment-items');

// Creating DOM Elements
const paginationContainer = document.createElement('div');
const paginationList = document.createElement('ul');

// Adding classes, attributes & texts when needed
paginationContainer.className = 'row';
paginationList.className = 'col-xs-12 text-center list-inline';

// Adding the elements to the parent node element first
paginationContainer.appendChild(paginationList);
document.querySelector('.container').appendChild(paginationContainer);

// Return the total number of pages
const numPages = () => Math.ceil(commentsItem.length / 10) - 1;


// Return the students selected by their range
const displayResults = (begin, end) => {
  // First hide all the students
  for (let y = 0; y < commentsItem.length; y++) {
    commentsItem[y].className = 'not-active';
  }
  // Then show those are needed
  for (let i = begin; i <= end; i++) {
    commentsItem[i].className = 'col-xs-8 comment-items';
  }
};


// Create the number of anchors needed
const pagination = () => {
  for (let i = 0; i <= numPages(); i++) {
    // First create the elements
    let item = document.createElement('li');
    let anchor = document.createElement('a');
    // Then the text
    anchor.textContent = i + 1;
    // Then add them
    item.appendChild(anchor);
    paginationList.appendChild(item);
    // Then the event listener
    anchor.addEventListener('click', function(event) {
        // If this is the latest page, show only the last item
        if (i === numPages()) {
            let startAt = i * 10;
            let finishAt = commentsItem.length - 1;
            displayResults(startAt, finishAt);
        // For the previous page, do this
        } else {
            let startAt = i * 10;
            let finishAt = startAt + 10 - 1;
            displayResults(startAt, finishAt);
        }
    });
  }
};



// When the page loads, show the first results
window.onload = () => {
    pagination();
    // By default, when the page loads, the first page is always selected
    displayResults(0, 9);
    // And the style is applied to its relative anchor.
    paginationList.querySelector('a').className = 'active';
};
