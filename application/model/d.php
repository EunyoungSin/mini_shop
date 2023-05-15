function select_board_info_no( &$param_no )
{
	$sql =
		" SELECT "
		."	board_no "
		."	,board_title "
		."	,board_contents "
		."	,board_write_date " // 0412 작성일 추가
		." FROM "
		."	board_info "
		." WHERE "
		."	board_no = :board_no "
		;

	$arr_prepare =
		array(
			":board_no"	=> $param_no
		);

	$conn = null;
	try
	{
		db_conn( $conn );
		$stmt = $conn->prepare( $sql );
		$stmt->execute( $arr_prepare );
		$result = $stmt->fetchAll();
	}
	catch( Exception $e )
	{
		return $e->getMessage();
	}
	finally
	{
		$conn = null;
	}

	return $result[0]; // 조건을 PK로 걸어줘서, 리턴값이 1개만 있기 때문에 [0]을 적어줌.
}

function insert_board_info( &$param_arr )
{
	$sql=
	" INSERT INTO board_info( "
	."	board_title "
	."	,board_contents "
	."	,board_write_date "
	." ) "
	." VALUES ( "
	."	:board_title "
	."	,:board_contents "
	."	,NOW() "
	." ) "
	;
	$arr_prepare =
	array(
		":board_title"		=> $param_arr["board_title"]
		,":board_contents"	=> $param_arr["board_contents"]
	);
	
	$conn = null;
	try
	{
		db_conn( $conn ); // PDO object set(DB연결)
		$conn->beginTransaction(); // Transaction 시작
		$stmt = $conn->prepare( $sql ); // statement object set
		$stmt->execute( $arr_prepare ); // DB request
		$result_cnt = $stmt->rowCount(); // query 적용 recode 갯수
		$conn->commit();
	}
	catch( Exception $e )
	{
		$conn->rollback();
		return $e->getMessage();
	}
	finally
	{
		$conn = null; // PDO 파기
	}

	return $result_cnt;