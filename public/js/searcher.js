//
/**
 * Objeto para busca de termos em Listas de objetos.
 */

/**
 * Verifica se o parâmetro passado é um object.
 * @param val: any 
 * @returns boolean
 */
function isObject(val) {
    return typeof val === 'object' && !Array.isArray(val) && val !== null;
}

/**
 * Verifica se o parâmetro passado é uma string.
 * @param val: any 
 * @returns boolean
 */
function isString(val) {
    return typeof val === 'string' || val instanceof String;
}

/**
 * Executa busca recursiva dentro de estruturas aninhadas.
 * @param term: string
 * @param data: array 
 * @returns bool
 */
function deepSearch(term, data) {
    if (isObject(data)) {
        console.log('deepSearch(',term,',',data,')');
        for (let key in data) {
            console.log('deepSearch(',term,') : [',key,':',data[key],']');
            if (deepSearch(term, data[key])) {
                return true;
            }
        }
    } else if (Array.isArray(data)) {
        for (let i = 0; i < data.length; i++) {
            console.log('deepSearch(',term,') : [',i,':',data[i],']');
            if (deepSearch(data[i])) {
                return true;
            }
        }
    } else if (isString(data)) {
        if (data.indexOf) {
            return data.indexOf(term) >= 0;
        }
    } else if (data && (data == term)) {
        return true;
    }
    return false;
}

/**
 * Raiz e instância do buscador.
 */
const Searcher = new (function() {
    let __data = [];
    /**
     * Muda a base de busca, ou seja, a lista de dados sendo trabalhada.
     * @param data: array
     * @returns Searcher
     */
    this.on = (data) => { __data = data; return this; };
    /**
     * Faz a busca do valor dentro da lista de dados sendo trabalhada.
     * @param tt: string
     * @returns array
     */
    this.search = (tt) => {
        let doms = [];
        for (let i = 0; i < __data.length; i++) {
            let dat = __data[i];
            console.log('[',i,'] = ',dat);
            for (let key in dat) {
                console.log('search(',tt,') : [',key,':',dat[key],']');
                if (key.indexOf(tt) >= 0) {
                    doms.push({ index: i, k: key, v: dat[key] });
                } else if (deepSearch(tt, dat[key])) {
                    doms.push({ index: i, k: key, v: dat[key] });
                }
            }
        }
        return doms;
    };
})();

var dados = [
    {name: 'Um dois três', value: 123},
    {name: 'Outros gatos', value: 9997},
    {name: 'somethong does not smell well', value: {a: 'Há dois temos', b: 'Passado e futuro', cc: 'eu dot com' }},
    {name: 'pilha de 2'}
];

var sample = Searcher.on(dados).search('dois');
