import { useEffect, useState } from "react";
import api from "./api";
interface Cliente {
  id: number;
  nombre: string;
  correo: string;
  telefono: string;
  direccion: string | null;
  ciudad: string;
  activo: boolean;
}
interface RespuestaAPI {
  success: boolean;
  message: string;
  data: Cliente[];
}
function App() {
  const [clientes, setClientes] = useState<Cliente[]>([]);
  const [cargando, setCargando] = useState(true);
  const [error, setError] = useState("");
  useEffect(() => {
    const cargarClientes = async () => {
      try {
        const response = await api.get<RespuestaAPI>("/clientes");
        setClientes(response.data.data);
      } catch (error) {
        console.error(error);
        setError("Error al cargar los clientes");
      } finally {
        setCargando(false);
      }
    };
    cargarClientes();
  }, []);
  if (cargando) return <h2>Cargando clientes...</h2>;
  if (error) return <h2>{error}</h2>;
  return (
    <div>
      {" "}
      <h1>Clientes</h1>{" "}
      {clientes.map((cliente) => (
        <div key={cliente.id}>
          {" "}
          <h2>{cliente.nombre}</h2> <p>{cliente.correo}</p>{" "}
          <p>Ciudad: {cliente.ciudad}</p>{" "}
          <p>Estado: {cliente.activo ? "Activo" : "Inactivo"}</p> <hr />{" "}
        </div>
      ))}{" "}
    </div>
  );
}
export default App;
