import React, { useEffect, useState } from 'react';
import { useHistory } from "react-router-dom";
import StarButton from '../components/StarButton';
import "../../css/home.css";
import {
    Menu,
    Item,
    useContextMenu
  } from "react-contexify";
import "react-contexify/dist/ReactContexify.css";

const testLocation = [{'id': 1, 'size': 30, 'location': {'x' : 10, 'y' : 30}, 'links':[{'size': 20, 'location': {'x':40, 'y':20}}, {'size': 20, 'location': {'x':100, 'y':300}}]}, {'id': 2, 'size': 20, 'location': {'size': 20, 'x' : 40, 'y' : 20}, 'links':[{'size': 30, 'location': {'x':10, 'y':30}}, {'id': 3, 'size': 20, 'location': {'x':100, 'y':300}}]}, {'id': 4, 'size': 20, 'location': {'x' : 100, 'y' : 300}}, {'size': 20, 'location': {'x' : 100, 'y' : 310}}];

function Home() {
    const history = useHistory();
    const { show } = useContextMenu();
    const [posts, setPosts] = useState([]);
    const [starId, setStarId] = useState([]);

    useEffect(async()=>{
        const res = await fetch(`http://127.0.0.1:8000/boards/`,{
            headers: {'Content-Type': 'application/json'},
            method: 'GET'
          })
        const json = await res.json();
		setPosts(json);
    },[]);

    function displayMenu(e){
        //x,y 위치에 별이 있는지 확인하고 있다면 id를 받아오는 함수 추가
        show(e, {
          id: "menu1"
        })
    }
    function displayMenu2(e){
        //x,y 위치에 별이 있는지 확인하고 있다면 id를 받아오는 함수 추가
        show(e, {
          id: "menu2"
        })
    }

    function handleWrite(e){
        history.push({pathname: "/write", state: {starId: 0}});
    }

    function handleLinkStar(e){
        history.push({pathname: "/write", state: {starId: starId}});
    }

    function getLinks(links){
        let linkList = [];
        posts.forEach((element)=>{
            if (links && links.includes(element.id)){
                linkList.push(element);
            }
        })
        return linkList;
    }

    return (
        <>
            <div onContextMenu={displayMenu}>
                <div className="fullscreen">
                    {posts && posts.map((star) => {
                        let links = getLinks(star.links);
                        return(
                        <div onContextMenu={() => {setStarId(star.id);}}>
                            <div onContextMenu={displayMenu2}>
                            <StarButton key={star.id} starId={star.id} x={star.x} y={star.y} links={links} size={star.size} title={star.title}/>
                            </div>
                        </div>
                    )})}
                </div>
            </div>
            <Menu id="menu1">
            <Item onClick={handleWrite}>
                글쓰기
            </Item>
            </Menu>
            <Menu id="menu2">
            <Item onClick={handleWrite}>
                글쓰기
            </Item>
            <Item onClick={handleLinkStar}>
                별자리 연결하기
            </Item>
            </Menu>
        </>
    );
}

export default Home;
