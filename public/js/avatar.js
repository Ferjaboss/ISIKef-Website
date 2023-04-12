const profileBtn = document.querySelector(".profile-btn");
const profileMenu = document.querySelector(".profile-menu");

profileBtn.addEventListener("click", () => {
  if (profileMenu.classList.contains("hidden")) {
    profileMenu.classList.remove("hidden");
  } else {
    profileMenu.classList.add("hidden");
  }
});

document.addEventListener("click", (event) => {
  if (
    !profileBtn.contains(event.target) &&
    !profileMenu.contains(event.target)
  ) {
    profileMenu.classList.add("hidden");
  }
});
