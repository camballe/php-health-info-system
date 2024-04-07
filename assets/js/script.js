const form = document.getElementById("reg-form");
const firstname = document.getElementById("firstname");
const middlename = document.getElementById("middlename");
const surname = document.getElementById("surname");
const dob = document.getElementById("dob");
const gender = document.getElementById("gender");
const county = document.getElementById("county");
const clearBtn = document.querySelector(".clear-btn");

form.addEventListener("submit", (e) => {
  if (!validateInputs()) {
    e.preventDefault(); // Prevent form submission if validation fails
  }
});

clearBtn.addEventListener("click", () => {
  firstname.value = "";
  middlename.value = "";
  surname.value = "";
  dob.value = "";
  gender.value = "";
  county.value = "";
});

const setError = (element, message) => {
  const inputBox = element.parentElement;
  const errorDisplay = inputBox.querySelector(".error");
  errorDisplay.innerText = message;
  inputBox.classList.add("error");
  inputBox.classList.remove("success");
};

const setSuccess = (element) => {
  const inputBox = element.parentElement;
  const errorDisplay = inputBox.querySelector(".error");
  errorDisplay.innerText = "";
  inputBox.classList.add("success");
  inputBox.classList.remove("error");
};

const validateInputs = () => {
  const firstnameValue = firstname.value.trim();
  const middlenameValue = middlename.value.trim();
  const surnameValue = surname.value.trim();
  const dobValue = dob.value.trim();
  const genderValue = gender.value.trim();
  const countyValue = county.value.trim();

  let isValid = true;

  if (firstnameValue === "") {
    setError(firstname, "First name is required.");
    isValid = false;
  } else {
    setSuccess(firstname);
  }
  if (middlenameValue === "") {
    setError(middlename, "Middle name is required.");
    isValid = false;
  } else {
    setSuccess(middlename);
  }
  if (surnameValue === "") {
    setError(surname, "Surname is required.");
    isValid = false;
  } else {
    setSuccess(surname);
  }
  if (dobValue === "") {
    setError(dob, "Date of birth is required.");
    isValid = false;
  } else {
    setSuccess(dob);
  }
  if (genderValue === "") {
    setError(gender, "Gender is required.");
    isValid = false;
  } else {
    setSuccess(gender);
  }
  if (countyValue === "") {
    setError(county, "County is required.");
    isValid = false;
  } else {
    setSuccess(county);
  }

  return isValid;
};
