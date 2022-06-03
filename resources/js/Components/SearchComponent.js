import React, {useState} from "react";
import axios from "axios";

function SearchComponent({route}) {
    const [query, setQuery] = useState('');
    const [debounce, setDebounce] = useState(true);
    const [focus, setFocus] = useState(false);
    const [result, setResult] = useState({});

    const minLength = 3;

    const changeValue = (e) => {
        const val = e.target.value;
        setQuery(val);

        if (val.length >= minLength && debounce) {
            const fd = new FormData();
            setDebounce(false);
            debouncer();
            fd.append('query', val);
            axios({
                method: "POST",
                headers: {"Content-Type": "multipart/form-data"},
                url: route,
                data: fd,
            })
                .then(r => {
                    setResult(r.data)
                })
                .catch(e => {
                    console.log(e.message)
                })
        }
    }

    const debouncer = () => {
        setTimeout(() => {
            setDebounce(true)
        }, 3000);
    }

    const show = () => {
        setFocus(true);
    }

    const hide = () => {
        setFocus(false)
    }

    return (
        <>
            <input type="text" className="header__search" placeholder="я ищу..." value={query} onChange={changeValue} onFocus={show} onBlur={hide}/>
            {
                query.length >= minLength && focus &&
                <div className="header__search-result">
                    {
                        Object.keys(result).map(item => {
                            return (
                                <div className="header__search-result-section" key={item}>
                                    <p className="header__search-result-title">{result[item].name}</p>
                                    {
                                        result[item].list.length
                                            ? <ul>
                                                {
                                                    result[item].list.map(el => <li key={el.slug}><a href={result[item].route + "/" + el.slug}>{el.name}</a></li>)
                                                }
                                            </ul>
                                            : <p>нет совпадений</p>
                                    }
                                </div>
                            )
                        })
                    }
                </div>
            }
        </>
    );
}

export default SearchComponent;
