import React, { useState, useEffect } from 'react';
import { useHistory } from 'react-router';
import Line from "./Line";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faStar } from "@fortawesome/free-solid-svg-icons";

function RelativeStarButton(props){
    const history = useHistory();
    function handleClick(starId) {
        if (starId !== undefined){
            history.push(`/detail/${starId}`);
        }
    };

    return(
        <>
            <FontAwesomeIcon icon={faStar} style={{"backgroundColor": "rgba( 255, 255, 255, 0 )", 
                                "color":"green",
                                "cursor":"pointer",
                                "fontSize":`${props.size}px`,
                                "position":"absolute",
                                "left":"50%",
                                "top":"60%",
                                "transform":"translate(-50%, -50%)",
                                "filter": "drop-shadow(0 0 5px green)",
                                "zIndex": 10
                                }}/>
            {props.links && 
                props.links.map((link) => {
                    return (
                        <div onClick={() => {handleClick(link.id);}} style={{"position":"absolute",
                                                                            "left":"50%",
                                                                            "top":"60%",
                                                                            "transform":"translate(-50%, -50%)"}}>
                            <FontAwesomeIcon icon={faStar} style={{"backgroundColor": "rgba( 255, 255, 255, 0 )", 
                                            "color":"white",
                                            "cursor":"pointer",
                                            "fontSize":`${link.size}px`,
                                            "position":"absolute",
                                            "left": `${(link.x - props.x) / 2}px`,
                                            "top": `${(link.y - props.y) / 2}px`,
                                            "filter": "drop-shadow(0 0 5px white)",
                                            "zIndex": 10
                                            }}/>

                            <Line fromX={0}  fromY={0} toX={(link.x - props.x) / 2} toY={(link.y - props.y) / 2} fromSize={0} toSize={link.size}/>
                        </div>
                    )
                })
            }
        </>
    );
}

export default RelativeStarButton;
