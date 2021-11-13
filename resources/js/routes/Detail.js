import React, { useEffect, useState, useRef } from "react";
import "../../css/detail.css";
import axios from "axios";
import { useHistory } from "react-router-dom";
import RelativeStarButton from "../components/RelativeStarButton";
import TimeForToday from "../components/TimeForToday";
import Pagination from "../components/Pagination";
import { toast } from 'react-toastify';
import { makeStyles } from '@material-ui/core/styles';
import Table from '@material-ui/core/Table'
import TableBody from '@material-ui/core/TableBody'
import TableCell from '@material-ui/core/TableCell'
import TableRow from '@material-ui/core/TableRow'
import TableContainer from '@material-ui/core/TableContainer';
import Paper from '@material-ui/core/Paper';

function Detail({post_id}){
  const [commentContent , setCommentContent] = useState("");
  // const [post, setPost] = useState([]);
  const [comment, setComment] = useState([]);
  const [pageNum, setPageNum] = useState(localStorage.getItem('pageNum') ? localStorage.getItem('pageNum') : 1);
  const [itemsCount, setItemsCount] = useState(0);
  const [commentItemsCount, setCommentItemsCount] = useState(0);
  const [commentPageNum, setCommentPageNum] = useState(1);
  const history = useHistory();
  const id = post_id.match.params.id;
  const post = {'id': 1, 'size': 30, 'location': {'x' : 10, 'y' : 30}, 'links':[{'id' : 2, 'size': 20, 'location' : {'x':40, 'y':20}}, {'id' : 3, 'size': 20,'location':{'x':100, 'y':300}}]};


  const useStyles = makeStyles(theme => ({
    table: {
      fontSize: 20,
      height : '10px'
    },
    cell: {
      fontSize: 20,
    },
    }));
  const classes = useStyles();

  
  useEffect(async() => {
		// TableRowy {
		// 	window.scrollTo(0,0);
		// 	const res = await fetch(`https://127.0.0.1:8000/api/post/detail/${id}/`)
		// 	const posts = await res.json()
		// 	setPost(posts);
		// 	if (commentPageNum === 1){
		// 		fetchComment();
		// 	}
		// 	else{
		// 		setCommentPageNum(1);
		// 	}
		// }
		// catch (e) {
		// 	console.log(e);
		// }

  }, [post_id]);

  useEffect(async() => {
    try{
      const res1 = await fetch(`https://127.0.0.1:8000/api/post/section/?page=${pageNum}`);
      const post_list = await res1.json();
      if (res1.status === 404){
        toast.error("오류, 새로고침 해주세요");
        history.push('/');
      }
      setItemsCount(post_list.count);
      setPostList(post_list.results);
    }
    catch(e){
      console.log(e);
    }
  },[pageNum]);



  const onDeleteClick = async () => {
    const ok = window.confirm("진짜 지우시겠습니까?");
    if (parseInt(post.writer_id) !== parseInt(user.user_pk))
      return ;
    if (ok) {
      const header = {
        headers: {
          'Authorization' : `JWT ${localStorage.getItem('token')}`	
        }
      }
      await axios.post(`https://127.0.0.1:8000/api/post/delete_post/${id}/`, {
      }, header).then(() => {
        toast.success('삭제 완료');
        history.push('/');
      })
      .catch((error) => {
        console.log(error);
      })
    }
  };

  return (
	  <>
      <div className="fullscreen">
        <div className="body-wrap">
          <TableContainer>
            <Table className={classes.table}>
              <TableBody>
              <TableRow>
                <TableCell className={classes.cell}>
                  {post.title}bca
                </TableCell>
                <TableCell style={{float:"right"}} className={classes.cell}>
                  {TimeForToday(post.created_at)}
                </TableCell>
              </TableRow>    
              <TableRow size="small">
                <TableCell className={classes.cell}>
                    <label>
                      {post.writer_name}abc
                    </label>
                </TableCell>
                <TableCell style={{float:"right"}} className={classes.cell}>
                  <button onClick={onDeleteClick}>삭제</button>
                </TableCell>
              </TableRow>
              <TableRow>
                <TableCell colSpan="2" className={classes.cell}>{post.content}</TableCell>
              </TableRow>
              <TableRow>
                {/* <TableCell colSpan="2">
                  댓글 &nbsp;&nbsp;&nbsp;<span>{commentItemsCount}</span>&nbsp;개
                </TableCell> */}
              </TableRow>
              </TableBody>
            </Table>
            </TableContainer>
            <div>
              <RelativeStarButton key={post.id} starId={post.id} location={post.location} links={post.links} size={post.size}/>
            </div>
        </div>
      </div>
    </>
  );
};

export default Detail;