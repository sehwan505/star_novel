import React, { useEffect, useState, useRef } from "react";
import "../../css/detail.css";
import axios from "axios";
import { useHistory } from "react-router-dom";
import RelativeStarButton from "../components/RelativeStarButton";
import TimeForToday from "../components/TimeForToday";
import { toast } from 'react-toastify';
import { makeStyles } from '@material-ui/core/styles';
import Table from '@material-ui/core/Table'
import TableBody from '@material-ui/core/TableBody'
import TableCell from '@material-ui/core/TableCell'
import TableRow from '@material-ui/core/TableRow'
import TableContainer from '@material-ui/core/TableContainer';
import Paper from '@material-ui/core/Paper';

function Detail({post_id}){
  const [post, setPost] = useState([]);
  const [links, setLinks] = useState([]);
  const history = useHistory();
  const id = post_id.match.params.id;
  // const post = {'id': 1, 'size': 30, 'location': {'x' : 10, 'y' : 30}, 'links':[{'id' : 2, 'size': 20, 'location' : {'x':40, 'y':20}}, {'id' : 3, 'size': 20,'location':{'x':100, 'y':300}}]};


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
		try {
			window.scrollTo(0,0);
			const res = await fetch(`http://127.0.0.1:8000/boards/${id}/`,{
          headers: {'Content-Type': 'application/json'},
          method: 'GET'
        })
			const posts = await res.json()
      console.log(posts);
			setPost(posts[0]);
      setLinks(posts[1]);
		}
		catch (e) {
			console.log(e);
		}

  }, [post_id]);

  const onDeleteClick = async () => {
    const ok = window.confirm("진짜 지우시겠습니까?");
    if (ok) {
      axios.delete(`http://127.0.0.1:8000/boards/${id}/`, {
      }, {
        headers: {'Content-Type': 'application/json'}
      }).then(() => {
        toast.success('삭제 완료');
        history.push('/');
      })
      .catch((error) => {
        history.push('/');
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
                  {post.title}
                </TableCell>
                <TableCell style={{float:"right"}} className={classes.cell}>
                  {TimeForToday(post.created_at)}
                </TableCell>
              </TableRow>    
              <TableRow size="small">
                <TableCell className={classes.cell}>
                    <label>
                      작성자A
                    </label>
                </TableCell>
                <TableCell style={{float:"right"}} className={classes.cell}>
                  <button onClick={onDeleteClick}>삭제</button>
                </TableCell>
              </TableRow>
              <TableRow>
                <TableCell colSpan="2" className={classes.cell}>{post.story}</TableCell>
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
              <RelativeStarButton key={post.id} starId={post.id} x={post.x} y={post.y} links={links} size={post.size}/>
            </div>
        </div>
      </div>
    </>
  );
};

export default Detail;