import React from "react";
import '../../css/detail.css';
import DraftEditor from "../components/Editor.js";


function Write({user, handleLogout, isAuthenticated}){
	return (
		<>
		<div className="body-wrap">
			<DraftEditor />
		</div>
		</>
	);
}

export default Write;