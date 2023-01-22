import React from "react";
// import Dropdownbtn from "./dropdownbutton";
function Form() {
  return (
    <form className="form">
      
      <input type="text" placeholder="Username" />
      <input type="password" placeholder="Password" />
      <button type="submit">Login</button>
    </form>
  );
}

export default Form;