function Comment(){
    const onSubmit = async (event) => {
        event.preventDefault();
        if(commentContent === ""){
            toast.error("댓글 내용이 없습니다");
          return ;
          }
        const header = {
          headers: {
            'Authorization' : `JWT ${localStorage.getItem('token')}`	
          }
        }
        await axios.post(`https://127.0.0.1:8000/api/post/add_comment/${id}/`, {
            post_id:id,
            content:commentContent,
            writer_id:user.user_pk,
            writer_name:user.username,
          }, header).then((response) => {
          })
          .catch((error) => {
            toast.error("오류 발생");
          })
        history.go(0);
      }
    
      const onChangeContent = (event) => {
        const {
          target: { value },
        } = event;
        setCommentContent(value);
      };

      async function fetchComment(){
        try {
          const res2 = await fetch(`https://127.0.0.1:8000/api/post/detail_comment/${id}/?page=${commentPageNum}`);
          const comments = await res2.json();
          setComment(comments.results);
          setCommentItemsCount(comments.count);
        }
        catch (e) {
          console.log(e);
        }
      }

      useEffect(() => {
        // fetchComment();
      }, [commentPageNum]);
      
      return (
          <>
            {/* {comment.map((comment) => (
                <Comment key={comment.comment_id} comment={comment} post_id={id} />
            ))}
            <TableContainer>
            <Table className={classes.table}>
            <TableBody>       
                <TableRow>
                    <TableCell>
                    <textarea value={commentContent}
                        type="text"
                        onChange={onChangeContent} 
                        placeholder="댓글을 남겨보세요">
                    </textarea>
                    </TableCell>
                </TableRow>
                <TableRow>
                    <TableCell>
                    <span className="submit" onClick={onSubmit}>등록</span>
                    </TableCell>
                </TableRow>
            </TableBody>
            </Table>
            </TableContainer> */}
            {/* <Pagination itemsCount={commentItemsCount} pageSize={10} currentPage={commentPageNum} setPageNum={setCommentPageNum} isComment={true}/> */}
          </>
      )
}

export default Comment;