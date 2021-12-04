import React from "react";
import '../../css/detail.css';
import DraftEditor from "../components/Editor.js";
import {useLocation} from "react-router-dom";


function Write(){
	const location = useLocation();
	const starId = location.state.starId;	
	return (
		<>
		<div className="body-wrap">
			<DraftEditor starId={starId}/>
		</div>
		</>
	);
}

export default Write;