// get the links container element
const linksContainer = document.getElementById("links-container");

// get all the link elements
const linkElements = linksContainer.querySelectorAll(".max-w-5xl");

// set the number of links to show per page
const linksPerPage = 6;

// calculate the total number of pages
const totalPages = Math.ceil(linkElements.length / linksPerPage);

// set the initial page to display
let currentPage = 1;

// get the prev and next buttons
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");

// function to display the links for the current page
function showLinks() {
  // calculate the start and end indexes for the links to show
  const startIndex = (currentPage - 1) * linksPerPage;
  const endIndex = startIndex + linksPerPage;

  // hide all link elements
  linkElements.forEach((link) => {
    link.style.display = "none";
  });

  // show the link elements for the current page
  for (let i = startIndex; i < endIndex && i < linkElements.length; i++) {
    linkElements[i].style.display = "block";
  }
}

// function to update the state of the prev and next buttons
function updateButtons() {
  // disable the prev button if on the first page
  if (currentPage === 1) {
    prevBtn.disabled = true;
  } else {
    prevBtn.disabled = false;
  }

  // disable the next button if on the last page
  if (currentPage === totalPages) {
    nextBtn.disabled = true;
  } else {
    nextBtn.disabled = false;
  }
}

// show the links for the initial page
showLinks();

// update the state of the prev and next buttons
updateButtons();

// add event listener for prev button click
prevBtn.addEventListener("click", () => {
  // decrement the current page
  currentPage--;

  // show the links for the new page
  showLinks();

  // update the state of the prev and next buttons
  updateButtons();
});

// add event listener for next button click
nextBtn.addEventListener("click", () => {
  // increment the current page
  currentPage++;

  // show the links for the new page
  showLinks();

  // update the state of the prev and next buttons
  updateButtons();
});
