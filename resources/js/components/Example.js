import React, { useState } from "react";
import ReactDOM from "react-dom";

function Example() {
  const [counter, setCounter] = useState(0);

  return (
    <div className="container">
      <div className="row justify-content-center">
        <div className="col-md-8">
          <div className="card">
            <div className="card-header">Example Component</div>

            <div className="card-body">
              <h1> {counter}</h1>
              <button
                className="btn btn-success"
                onClick={() => setCounter(counter + 1)}
              >
                +
              </button>
              <button
                className="ml-2 btn btn-danger"
                onClick={() => setCounter(counter - 1)}
              >
                -
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Example;

if (document.getElementById("example")) {
  ReactDOM.render(<Example />, document.getElementById("example"));
}
