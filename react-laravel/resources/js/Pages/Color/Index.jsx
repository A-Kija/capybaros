import { DataProvider } from './Data';
import Layout from './Layout';

export default function Index(data) {
    return (
        <DataProvider data={data}>
            <Layout />
        </DataProvider>
    );
}