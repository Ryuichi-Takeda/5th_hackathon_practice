const getAgenciesForFirstView = async () => {
  //関数式：定義する前には実行できない&&無名関数、アロー関数を使うときに使用
  // async アロー関数
  const res = await axios.get(`${userPrefix}/firstView.php`);
  //await,結果を取得後続の処理実行
  //axios外部
  //await axious.get()取得 GETリクエストをaxiosで送る
  //await axious.post()
  const { data } = res;
  // resはdata,header...などある中から{data}のみを取り出す
  //const{data} = await axious.get('')
  drawHTMLs.agencies(data);
  //drawHtmlsのagencies(data)を表示させる

  //画面が真っ白になるのを避ける
  
};

const handleSearch = async () => {
  let industries = [];
  let types = [];
  const industriesTarget = document.getElementsByName("industries");
  const typesTarget = document.getElementsByName("types");
  industriesTarget.forEach((industry) => {
    if (industry.checked === true) industries.push(industry.value);
  });
  typesTarget.forEach((type) => {
    if (type.checked === true) types.push(type.value);
  });
  const { data } = await searchAgencies(types, industries);
  drawHTMLs.agencies(data);
  //dataの部分を取り出す
};

const searchAgencies = async (types, industries) => {
  //空の配列と定義してpushしていく
  types = types.length === 0 ? null : types.join();
  industries = industries.length === 0 ? null : industries.join();
  const params = {
    types: types,
    industries: industries,
  };
  const res = await axios.get(`${userPrefix}/searchAgencies.php`, {
    params: params,
  });

  return {
    data: res.data,
    stauts: res.status,
  };
};

const getFavs = async () => {
  const agencyIds = sessionStorage.getItem("ids");
  const params = {
    agency_ids: agencyIds,
  };
  await axios
    .get(`${userPrefix}/fav.php`, {
      params: params,
    })
    .then((res) => {
      drawHTMLs.favs(res.data);
    });
};
