document.addEventListener("DOMContentLoaded", function () {
  // Show/hide PMI certification options based on course selection
  const courseSelect = document.getElementById("preferredCourse");
  const pmiOptions = document.getElementById("pmiOptions");

  courseSelect.addEventListener("change", function () {
    if (courseSelect.value === "PMI Certification") {
      pmiOptions.style.display = "block"; // Show PMI options
    } else {
      pmiOptions.style.display = "none"; // Hide PMI options
    }
  });
});
