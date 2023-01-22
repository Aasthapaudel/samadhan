import React from "react";
function Dropdownbtn()
{
    return (

        <div>
     
          <label> 
            Choose Category 
            <select>
     
              <option value="student">Student</option>
     
              <option value="Teacher">Teacher</option>
              <option value="Admin">Admin</option>
            </select>
          </label>
        </div>
      );
};
export default Dropdownbtn;